<?php
namespace shop\useCases\manage\user;

use shop\entities\user\BonusAccount;
use shop\entities\user\cabinet\Operation;
use shop\entities\user\User;
use shop\forms\manage\user\BonusAccountForm;
use shop\repositories\user\BonusAccountRepository;
use shop\repositories\user\cabinet\withdrawal\WithdrawalBankTransferRepository;
use shop\repositories\user\cabinet\withdrawal\WithdrawalCryptoCurrencyRepository;
use shop\repositories\user\cabinet\withdrawal\WithdrawalDebitCreditCardRepository;
use shop\repositories\user\cabinet\withdrawal\WithdrawalEPaymentRepository;
use shop\repositories\user\DepoAccountRepository;
use shop\repositories\user\OperationRepository;
use shop\repositories\user\UserDocumentsRepository;
use shop\repositories\user\UserRepository;
use shop\forms\manage\user\UserCreateForm;
use shop\forms\manage\user\UserEditForm;

use shop\services\RoleManager;
use shop\services\TransactionManager;



class UserManageService
{
    private $repository;
    private $roles;
    private $transaction;
    private $userDocumentsRepository;
    private $depoAccountRepository;
    private $operationRepository;
    private $withdrawalBankTransferRepository;
    private $withdrawalDebitCreditCardRepository;
    private $withdrawalEPaymentRepository;
    private $withdrawalCryptoCurrencyRepository;
    private $bonusAccountRepository;

    public function __construct(
        UserRepository $repository,
        RoleManager $roles,
        TransactionManager $transaction,
        UserDocumentsRepository $userDocumentsRepository,
        DepoAccountRepository $depoAccountRepository,
        OperationRepository $operationRepository,
        WithdrawalBankTransferRepository $withdrawalBankTransferRepository,
        WithdrawalDebitCreditCardRepository $withdrawalDebitCreditCardRepository,
        WithdrawalEPaymentRepository $withdrawalEPaymentRepository,
        WithdrawalCryptoCurrencyRepository $withdrawalCryptoCurrencyRepository,
        BonusAccountRepository $bonusAccountRepository
    )
    {
        $this->repository = $repository;
        $this->roles = $roles;
        $this->transaction = $transaction;
        $this->userDocumentsRepository = $userDocumentsRepository;
        $this->depoAccountRepository = $depoAccountRepository;
        $this->operationRepository = $operationRepository;
        $this->withdrawalBankTransferRepository = $withdrawalBankTransferRepository;
        $this->withdrawalDebitCreditCardRepository = $withdrawalDebitCreditCardRepository;
        $this->withdrawalEPaymentRepository = $withdrawalEPaymentRepository;
        $this->withdrawalCryptoCurrencyRepository = $withdrawalCryptoCurrencyRepository;
        $this->bonusAccountRepository = $bonusAccountRepository;
    }


    public function create(UserCreateForm $form): User
    {
        $user = User::create(
            $form->username,
            $form->email,
            $form->password
        );
        $this->transaction->wrap(function () use ($user, $form) {
            $this->repository->save($user);
            $this->roles->assign($user->id, $form->role);
        });
        return $user;
    }



    public function edit($id, UserEditForm $form): void
    {
        $user = $this->repository->getUserById($id);

        $user->edit(
            $form->username,
            $form->email,
            $form->blocked,
            $form->termin_percent,
            $form->deal_percent,
            $form->liquidity_percent,
            $form->balance_deal
        );
        $this->transaction->wrap(function () use ($user, $form) {
            $this->repository->save($user);
            $this->roles->assign($user->id, $form->role);
        });
    }

    public function assignRole($id, $role): void
    {
        $user = $this->repository->getUserById($id);
        $this->roles->assign($user->id, $role);
    }


    public function remove($id): void
    {
        $user = $this->repository->getUserById($id);
        $this->repository->remove($user);
    }



    public function verify($id): void
    {
        $user = $this->repository->getUserById($id);
        $user->verify();
        $this->repository->save($user);
    }



    public function unVerify($id): void
    {
        $user = $this->repository->getUserById($id);
        $user->unVerify();
        $this->repository->save($user);
    }

    // User Documents

    public function verifyDocument($userId, $id): void
    {
        $user = $this->repository->getUserById($userId);
        $document = $this->userDocumentsRepository->getByUserAndId($user->id, $id);
        $document->verify();
        $this->userDocumentsRepository->save($document);
    }



    public function unVerifyDocument($userId, $id): void
    {
        $user = $this->repository->getUserById($userId);
        $document = $this->userDocumentsRepository->getByUserAndId($user->id, $id);
        $document->unVerify();
        $this->userDocumentsRepository->save($document);
    }


    // User Depo Accounts

    public function successDepoAccount($id): void
    {
        $depoAccount = $this->depoAccountRepository->get($id);
        $depoAccount->success();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($depoAccount->user_id, $depoAccount->created_at);
        $operation->changeStatus(Operation::STATUS_SUCCESS);

        $this->transaction->wrap(function () use ($depoAccount, $operation) {
            $this->depoAccountRepository->save($depoAccount);
            $this->operationRepository->save($operation);
        });
    }


    public function rejectDepoAccount($id): void
    {
        $depoAccount = $this->depoAccountRepository->get($id);
        $depoAccount->reject();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($depoAccount->user_id, $depoAccount->created_at);
        $operation->changeStatus(Operation::STATUS_REJECTED);
        $user = $this->repository->getUserById($depoAccount->user_id);
        $user->inputMoney($depoAccount->nominal_cost);

        $this->transaction->wrap(function () use ($depoAccount, $operation, $user) {
            $this->depoAccountRepository->save($depoAccount);
            $this->operationRepository->save($operation);
            $this->repository->save($user);
        });
    }


    // User Withdrawals Bank Transfer

    public function successWithdrawalBankTransfer($id): void
    {
        $withdrawal = $this->withdrawalBankTransferRepository->get($id);
        $withdrawal->success();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($withdrawal->user_id, $withdrawal->created_at);
        $operation->changeStatus(Operation::STATUS_SUCCESS);

        $this->transaction->wrap(function () use ($withdrawal, $operation) {
            $this->withdrawalBankTransferRepository->save($withdrawal);
            $this->operationRepository->save($operation);
        });
    }


    public function rejectWithdrawalBankTransfer($id): void
    {
        $withdrawal = $this->withdrawalBankTransferRepository->get($id);
        $withdrawal->reject();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($withdrawal->user_id, $withdrawal->created_at);
        $operation->changeStatus(Operation::STATUS_REJECTED);
        $user = $this->repository->getUserById($withdrawal->user_id);
        $user->inputMoney($withdrawal->amount);

        $this->transaction->wrap(function () use ($withdrawal, $operation, $user) {
            $this->withdrawalBankTransferRepository->save($withdrawal);
            $this->operationRepository->save($operation);
            $this->repository->save($user);
        });
    }



    // User Withdrawals Debit Credit Card

    public function successWithdrawalDebitCreditCard($id): void
    {
        $withdrawal = $this->withdrawalDebitCreditCardRepository->get($id);
        $withdrawal->success();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($withdrawal->user_id, $withdrawal->created_at);
        $operation->changeStatus(Operation::STATUS_SUCCESS);

        $this->transaction->wrap(function () use ($withdrawal, $operation) {
            $this->withdrawalDebitCreditCardRepository->save($withdrawal);
            $this->operationRepository->save($operation);
        });
    }


    public function rejectWithdrawalDebitCreditCard($id): void
    {
        $withdrawal = $this->withdrawalDebitCreditCardRepository->get($id);
        $withdrawal->reject();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($withdrawal->user_id, $withdrawal->created_at);
        $operation->changeStatus(Operation::STATUS_REJECTED);
        $user = $this->repository->getUserById($withdrawal->user_id);
        $user->inputMoney($withdrawal->amount);

        $this->transaction->wrap(function () use ($withdrawal, $operation, $user) {
            $this->withdrawalDebitCreditCardRepository->save($withdrawal);
            $this->operationRepository->save($operation);
            $this->repository->save($user);
        });
    }



    // User Withdrawals E-Payment

    public function successWithdrawalEPayment($id): void
    {
        $withdrawal = $this->withdrawalEPaymentRepository->get($id);
        $withdrawal->success();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($withdrawal->user_id, $withdrawal->created_at);
        $operation->changeStatus(Operation::STATUS_SUCCESS);

        $this->transaction->wrap(function () use ($withdrawal, $operation) {
            $this->withdrawalEPaymentRepository->save($withdrawal);
            $this->operationRepository->save($operation);
        });
    }


    public function rejectWithdrawalEPayment($id): void
    {
        $withdrawal = $this->withdrawalEPaymentRepository->get($id);
        $withdrawal->reject();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($withdrawal->user_id, $withdrawal->created_at);
        $operation->changeStatus(Operation::STATUS_REJECTED);
        $user = $this->repository->getUserById($withdrawal->user_id);
        $user->inputMoney($withdrawal->amount);

        $this->transaction->wrap(function () use ($withdrawal, $operation, $user) {
            $this->withdrawalEPaymentRepository->save($withdrawal);
            $this->operationRepository->save($operation);
            $this->repository->save($user);
        });
    }



    // User Withdrawals Crypto Currency

    public function successWithdrawalCryptoCurrency($id): void
    {
        $withdrawal = $this->withdrawalCryptoCurrencyRepository->get($id);
        $withdrawal->success();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($withdrawal->user_id, $withdrawal->created_at);
        $operation->changeStatus(Operation::STATUS_SUCCESS);

        $this->transaction->wrap(function () use ($withdrawal, $operation) {
            $this->withdrawalCryptoCurrencyRepository->save($withdrawal);
            $this->operationRepository->save($operation);
        });
    }


    public function rejectWithdrawalCryptoCurrency($id): void
    {
        $withdrawal = $this->withdrawalCryptoCurrencyRepository->get($id);
        $withdrawal->reject();
        $operation = $this->operationRepository->getByUserIdAndCreatedAt($withdrawal->user_id, $withdrawal->created_at);
        $operation->changeStatus(Operation::STATUS_REJECTED);
        $user = $this->repository->getUserById($withdrawal->user_id);
        $user->inputMoney($withdrawal->amount);

        $this->transaction->wrap(function () use ($withdrawal, $operation, $user) {
            $this->withdrawalCryptoCurrencyRepository->save($withdrawal);
            $this->operationRepository->save($operation);
            $this->repository->save($user);
        });
    }



    // Bonus Accounts

    public function createBonusAccount($userId, BonusAccountForm $form): BonusAccount
    {
        $created_at = time();
        $user = $this->repository->getUserById($userId);

        $bonusAccount = BonusAccount::create(
            $user->id,
            $form->type,
            $form->type_text,
            BonusAccount::STATUS_SUCCESS,
            $form->amount,
            $created_at
        );

        $operation = Operation::create($user->id, Operation::STATUS_SUCCESS, $created_at, $bonusAccount->amount);

        if ($form->type == BonusAccount::TYPE_INPUT){
            $operation->setTypeOperation(Operation::TYPE_OPERATION_INPUT_ADMIN, $bonusAccount->type_text);
            $user->inputMoney($bonusAccount->amount);
        } else {
            $operation->setTypeOperation(Operation::TYPE_OPERATION_OUTPUT_ADMIN, $bonusAccount->type_text);
            $user->outputMoney($bonusAccount->amount);
        }

        $this->transaction->wrap(function () use ($bonusAccount, $operation, $user) {
            $this->bonusAccountRepository->save($bonusAccount);
            $this->operationRepository->save($operation);
            $this->repository->save($user);
        });
        return $bonusAccount;
    }


}
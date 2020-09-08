<?php

namespace shop\useCases\user;

use shop\entities\user\cabinet\DepoAccount;
use shop\entities\user\cabinet\Operation;
use shop\entities\user\cabinet\Order;
use shop\entities\user\cabinet\withdrawal\WithdrawalBankTransfer;
use shop\entities\user\cabinet\withdrawal\WithdrawalCryptoCurrency;
use shop\entities\user\cabinet\withdrawal\WithdrawalDebitCreditCard;
use shop\entities\user\cabinet\withdrawal\WithdrawalEPayment;
use shop\forms\user\cabinet\withdrawal\WithdrawalCryptoCurrencyForm;
use shop\forms\user\cabinet\withdrawal\WithdrawalDebitCreditCardForm;
use shop\forms\user\cabinet\withdrawal\WithdrawalEPaymentForm;
use shop\forms\user\DepoAccountForm;
use shop\forms\user\OrderForm;
use shop\forms\user\cabinet\withdrawal\WithdrawalBankTransferForm;
use shop\helpers\DepoAccountHelper;
use shop\repositories\user\cabinet\withdrawal\WithdrawalBankTransferRepository;
use shop\repositories\user\cabinet\withdrawal\WithdrawalCryptoCurrencyRepository;
use shop\repositories\user\cabinet\withdrawal\WithdrawalDebitCreditCardRepository;
use shop\repositories\user\cabinet\withdrawal\WithdrawalEPaymentRepository;
use shop\repositories\user\DepoAccountRepository;
use shop\repositories\user\OperationRepository;
use shop\repositories\user\OrderRepository;
use shop\repositories\user\UserRepository;
use shop\services\TransactionManager;

class UserService
{
    private $users;
    private $transaction;
    private $depoAccountRepository;
    private $operationRepository;
    private $withdrawalBankTransferRepository;
    private $withdrawalDebitCreditCardRepository;
    private $withdrawalEPaymentRepository;
    private $withdrawalCryptoCurrencyRepository;
    private $orderRepository;

    public function __construct(
        UserRepository $users,
        TransactionManager $transaction,
        DepoAccountRepository $depoAccountRepository,
        OperationRepository $operationRepository,
        WithdrawalBankTransferRepository $withdrawalBankTransferRepository,
        WithdrawalDebitCreditCardRepository $withdrawalDebitCreditCardRepository,
        WithdrawalEPaymentRepository $withdrawalEPaymentRepository,
        WithdrawalCryptoCurrencyRepository $withdrawalCryptoCurrencyRepository,
        OrderRepository $orderRepository
    )
    {
        $this->users = $users;
        $this->transaction = $transaction;
        $this->depoAccountRepository = $depoAccountRepository;
        $this->operationRepository = $operationRepository;
        $this->withdrawalBankTransferRepository = $withdrawalBankTransferRepository;
        $this->withdrawalDebitCreditCardRepository = $withdrawalDebitCreditCardRepository;
        $this->withdrawalEPaymentRepository = $withdrawalEPaymentRepository;
        $this->withdrawalCryptoCurrencyRepository = $withdrawalCryptoCurrencyRepository;
        $this->orderRepository = $orderRepository;
    }


    public function createDepoAccount($userId, DepoAccountForm $form): DepoAccount
    {
        $user = $this->users->getUserById($userId);
        $created_at = time();

        $account = DepoAccount::create(
            $user->id,
            $form->type,
            $form->first_name,
            $form->last_name,
            $form->father_name,
            $form->address,
            $form->passport,
            $form->inn,
            $created_at
        );
        $account->setOtherInformation(
            $form->account_depo,
            $form->type_of_securities,
            $form->terms,
            $form->type_of_accounting,
            $form->quantity_of_securities,
            $form->nominal_cost,
            $form->bank
        );

        $operation = Operation::create($user->id, Operation::STATUS_WAIT, $created_at, $account->nominal_cost);
        $operation->setTypeOperation(Operation::TYPE_OPERATION_OUTPUT_DEPO, DepoAccountHelper::getTypeName($account->type));

        $this->transaction->wrap(function () use ($user, $account, $operation) {
            $this->depoAccountRepository->save($account);
            $user->outputMoney($account->nominal_cost);
            $this->users->save($user);
            $this->operationRepository->save($operation);
        });
        return $account;
    }


    public function createWithdrawalBankTransfer($userId, WithdrawalBankTransferForm $form): WithdrawalBankTransfer
    {
        $user = $this->users->getUserById($userId);
        $created_at = time();

        $withdrawal = WithdrawalBankTransfer::create(
            $user->id,
            $form->first_name,
            $form->last_name,
            $form->phone,
            $form->email,
            $form->address,
            $form->user_account,
            $form->bank_account,
            $form->bank_name,
            $form->bank_address,
            $form->swift,
            $form->iban,
            $form->amount,
            $created_at
        );

        $operation = Operation::create($user->id, Operation::STATUS_WAIT, $created_at, $withdrawal->amount);
        $operation->setTypeOperation(Operation::TYPE_OPERATION_OUTPUT_MONEY, 'Банковский перевод');

        $this->transaction->wrap(function () use ($user, $withdrawal, $operation) {
            $this->withdrawalBankTransferRepository->save($withdrawal);
            $user->outputMoney($withdrawal->amount);
            $this->users->save($user);
            $this->operationRepository->save($operation);
        });
        return $withdrawal;
    }


    public function createWithdrawalDebitCreditCard($userId, WithdrawalDebitCreditCardForm $form): WithdrawalDebitCreditCard
    {
        $user = $this->users->getUserById($userId);

        $created_at = time();

        $withdrawal = WithdrawalDebitCreditCard::create(
            $user->id,
            $form->first_name,
            $form->last_name,
            $form->phone,
            $form->email,
            $form->address,
            $form->user_account,
            $form->card_number,
            $form->card_holder,
            $form->expire,
            $form->amount,
            $created_at
        );

        $operation = Operation::create($user->id, Operation::STATUS_WAIT, $created_at, $withdrawal->amount);
        $operation->setTypeOperation(Operation::TYPE_OPERATION_OUTPUT_MONEY, 'На дебетовую или кредитную карту');

        $this->transaction->wrap(function () use ($user, $withdrawal, $operation) {
            $this->withdrawalDebitCreditCardRepository->save($withdrawal);
            $user->outputMoney($withdrawal->amount);
            $this->users->save($user);
            $this->operationRepository->save($operation);
        });
        return $withdrawal;
    }


    public function createWithdrawalEPayment($userId, WithdrawalEPaymentForm $form): WithdrawalEPayment
    {
        $user = $this->users->getUserById($userId);
        $created_at = time();

        $withdrawal = WithdrawalEPayment::create(
            $user->id,
            $form->address,
            $form->user_account,
            $form->amount,
            $created_at
        );

        $operation = Operation::create($user->id, Operation::STATUS_WAIT, $created_at, $withdrawal->amount);
        $operation->setTypeOperation(Operation::TYPE_OPERATION_OUTPUT_MONEY, 'Электронные платежи');

        $this->transaction->wrap(function () use ($user, $withdrawal, $operation) {
            $this->withdrawalEPaymentRepository->save($withdrawal);
            $user->outputMoney($withdrawal->amount);
            $this->users->save($user);
            $this->operationRepository->save($operation);
        });
        return $withdrawal;
    }


    public function createWithdrawalCryptoCurrency($userId, WithdrawalCryptoCurrencyForm $form): WithdrawalCryptoCurrency
    {
        $user = $this->users->getUserById($userId);
        $created_at = time();

        $withdrawal = WithdrawalCryptoCurrency::create(
            $user->id,
            $form->address,
            $form->user_account,
            $form->amount,
            $created_at
        );

        $operation = Operation::create($user->id, Operation::STATUS_WAIT, $created_at, $withdrawal->amount);
        $operation->setTypeOperation(Operation::TYPE_OPERATION_OUTPUT_MONEY, 'Криптовалюта');

        $this->transaction->wrap(function () use ($user, $withdrawal, $operation) {
            $this->withdrawalCryptoCurrencyRepository->save($withdrawal);
            $user->outputMoney($withdrawal->amount);
            $this->users->save($user);
            $this->operationRepository->save($operation);
        });
        return $withdrawal;
    }



    public function createOrder($userId, OrderForm $form): Order
    {
        $created_at = time();
        $user = $this->users->getUserById($userId);
        $order = Order::create(
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->phone,
            Order::RECIPIENT,
            Order::PAYMENT_METHOD,
            Order::DESCRIPTION,
            $form->amount,
            $form->amount,
            0,
            $form->amount,
            $created_at
        );

        $operation = Operation::create($user->id, Operation::STATUS_NOT_CONFIRM, $created_at, $order->amount);
        $operation->setTypeOperation(Operation::TYPE_OPERATION_INPUT_MONEY);

        $this->transaction->wrap(function () use ($order, $operation) {
            $this->orderRepository->save($order);
            $this->operationRepository->save($operation);
        });

        return $order;
    }



}
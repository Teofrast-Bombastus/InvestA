<?php
namespace shop\useCases\auth;


use shop\access\Rbac;
use shop\forms\auth\SignupForFrontForm;
use shop\forms\auth\SignupForm;
use shop\entities\user\User;
use shop\services\RoleManager;
use shop\services\TransactionManager;
use shop\repositories\user\UserRepository;

class SignupService{

    private $users;
    private $roles;
    private $transaction;

    public function __construct(
        UserRepository $users,
        RoleManager $roles,
        TransactionManager $transaction
    )
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->transaction = $transaction;
    }


    public function signup(SignupForm $form): void
    {
        $user = User::signup(
            $form->username,
            $form->email,
            $form->password
        );
        $this->transaction->wrap(function () use ($user) {
            $this->users->save($user);
            $this->roles->assign($user->id, Rbac::ROLE_USER);
        });
        $this->users->save($user);
    }



    public function signupForFront(SignupForFrontForm $form): void
    {
        $user = User::signupForFront(
            $form->first_name,
            $form->last_name,
            $form->username,
            $form->email,
            $form->phone,
            $form->promo_code,
            $form->password1,
            $form->type_account
        );
        $this->transaction->wrap(function () use ($user) {
            $this->users->save($user);
            $this->roles->assign($user->id, Rbac::ROLE_USER);
        });
        $this->users->save($user);
    }


    public function confirm($token): void
    {
        if (empty($token)){
            throw new \DomainException('Empty confirm token');
        }
        $user = $this->users->getUserByConfirmToken($token);
        $user->confirmSignup();
        $this->users->save($user);
    }


}
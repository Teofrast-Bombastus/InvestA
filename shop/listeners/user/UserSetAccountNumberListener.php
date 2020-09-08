<?php

namespace shop\listeners\user;

use shop\entities\user\User;
use shop\repositories\user\UserRepository;
use shop\entities\user\events\UserSetAccountNumber;

class UserSetAccountNumberListener
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(UserSetAccountNumber $event): void
    {
        $user = $event->user;
        $user->setAccount(User::ACCOUNT_NUMBER . $user->id);
        $this->repository->save($user);
    }
}
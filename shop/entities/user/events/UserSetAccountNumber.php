<?php

namespace shop\entities\user\events;

use shop\entities\user\User;

class UserSetAccountNumber
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
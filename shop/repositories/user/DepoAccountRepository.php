<?php
namespace shop\repositories\user;

use shop\entities\user\cabinet\DepoAccount;
use shop\repositories\NotFoundException;

class DepoAccountRepository
{
    public function get($id): DepoAccount
    {
        if (!$account = DepoAccount::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $account;
    }

    public function save(DepoAccount $account): void
    {
        if (!$account->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(DepoAccount $account): void
    {
        if (!$account->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}
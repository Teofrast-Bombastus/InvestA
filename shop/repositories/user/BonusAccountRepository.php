<?php
namespace shop\repositories\user;

use shop\entities\user\BonusAccount;
use shop\repositories\NotFoundException;

class BonusAccountRepository
{
    public function get($id): BonusAccount
    {
        if (!$obj = BonusAccount::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $obj;
    }

    public function save(BonusAccount $obj): void
    {
        if (!$obj->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(BonusAccount $obj): void
    {
        if (!$obj->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}
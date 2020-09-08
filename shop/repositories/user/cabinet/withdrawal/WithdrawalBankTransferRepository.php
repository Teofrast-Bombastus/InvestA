<?php
namespace shop\repositories\user\cabinet\withdrawal;


use shop\entities\user\cabinet\withdrawal\WithdrawalBankTransfer;
use shop\repositories\NotFoundException;

class WithdrawalBankTransferRepository
{
    public function get($id): WithdrawalBankTransfer
    {
        if (!$obj = WithdrawalBankTransfer::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $obj;
    }

    public function save(WithdrawalBankTransfer $obj): void
    {
        if (!$obj->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(WithdrawalBankTransfer $obj): void
    {
        if (!$obj->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}
<?php
namespace shop\repositories\user\cabinet\withdrawal;


use shop\entities\user\cabinet\withdrawal\WithdrawalEPayment;
use shop\repositories\NotFoundException;

class WithdrawalEPaymentRepository
{
    public function get($id): WithdrawalEPayment
    {
        if (!$obj = WithdrawalEPayment::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $obj;
    }

    public function save(WithdrawalEPayment $obj): void
    {
        if (!$obj->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(WithdrawalEPayment $obj): void
    {
        if (!$obj->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}
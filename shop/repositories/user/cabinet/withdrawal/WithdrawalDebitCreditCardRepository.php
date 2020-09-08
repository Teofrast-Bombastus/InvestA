<?php
namespace shop\repositories\user\cabinet\withdrawal;


use shop\entities\user\cabinet\withdrawal\WithdrawalDebitCreditCard;
use shop\repositories\NotFoundException;

class WithdrawalDebitCreditCardRepository
{
    public function get($id): WithdrawalDebitCreditCard
    {
        if (!$obj = WithdrawalDebitCreditCard::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $obj;
    }

    public function save(WithdrawalDebitCreditCard $obj): void
    {
        if (!$obj->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(WithdrawalDebitCreditCard $obj): void
    {
        if (!$obj->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}
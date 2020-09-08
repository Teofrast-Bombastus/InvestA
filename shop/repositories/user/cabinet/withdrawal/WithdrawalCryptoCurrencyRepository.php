<?php
namespace shop\repositories\user\cabinet\withdrawal;


use shop\entities\user\cabinet\withdrawal\WithdrawalCryptoCurrency;
use shop\repositories\NotFoundException;

class WithdrawalCryptoCurrencyRepository
{
    public function get($id): WithdrawalCryptoCurrency
    {
        if (!$obj = WithdrawalCryptoCurrency::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $obj;
    }

    public function save(WithdrawalCryptoCurrency $obj): void
    {
        if (!$obj->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(WithdrawalCryptoCurrency $obj): void
    {
        if (!$obj->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}
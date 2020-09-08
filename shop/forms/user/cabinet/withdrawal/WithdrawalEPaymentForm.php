<?php

namespace shop\forms\user\cabinet\withdrawal;

use shop\entities\user\User;
use yii\base\Model;

class WithdrawalEPaymentForm extends Model
{
    public $address;
    public $user_account;
    public $amount;
    public $_user;

    public function __construct(User $user, $config = [])
    {
        $this->address = $user->address;
        $this->user_account = $user->account;
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['address', 'user_account', 'amount'], 'required'],
            [['address'], 'string', 'max' => 255],
            [['user_account'], 'number'],
            [['amount'], 'double', 'max' => $this->_user->balance, 'min' => 0.01],
        ];
    }


    public function attributeLabels()
    {
        return [
            'address' => 'Адрес',
            'user_account' => 'Счет',
            'amount' => 'Сумма, ₽',
        ];
    }



}
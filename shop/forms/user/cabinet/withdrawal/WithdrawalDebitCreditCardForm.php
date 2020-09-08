<?php

namespace shop\forms\user\cabinet\withdrawal;

use shop\entities\user\User;
use yii\base\Model;

class WithdrawalDebitCreditCardForm extends Model
{
    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $address;
    public $user_account;
    public $card_number;
    public $card_holder;
    public $expire;
    public $amount;
    public $_user;

    public function __construct(User $user, $config = [])
    {
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->user_account = $user->account;
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['first_name', 'last_name', 'phone', 'email', 'address', 'user_account', 'card_number', 'card_holder', 'expire', 'amount'], 'required'],
            [['first_name', 'last_name', 'phone', 'address', 'card_holder', 'expire'], 'string', 'max' => 255],
            [['user_account', 'card_number'], 'number'],
            ['email', 'email'],
            ['phone', 'replacePhone'],
            [['amount'], 'double', 'max' => $this->_user->balance, 'min' => 0.01],
        ];
    }


    public function replacePhone()
    {
        $this->phone = str_replace(" ", "", $this->phone);
    }


    public function attributeLabels()
    {
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'phone' => 'Телефон',
            'email' => 'Email',
            'address' => 'Адрес',
            'user_account' => 'Счет',
            'card_number' => 'Номер карты',
            'card_holder' => 'Владелец карты',
            'expire' => 'Срок действия',
            'amount' => 'Сумма, ₽',
        ];
    }



}
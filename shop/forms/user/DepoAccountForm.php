<?php

namespace shop\forms\user;

use shop\entities\user\User;
use shop\helpers\DepoAccountHelper;
use yii\base\Model;

class DepoAccountForm  extends Model
{
    public $type;
    public $first_name;
    public $last_name;
    public $father_name;
    public $address;
    public $passport;
    public $inn;
    public $account_depo;
    public $type_of_securities;
    public $terms;
    public $type_of_accounting;
    public $quantity_of_securities;
    public $nominal_cost;
    public $bank;
    public $_user;

    public function __construct(User $user, $type, $config = [])
    {
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->type = $type;
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['type', 'first_name', 'last_name', 'father_name', 'address', 'passport', 'inn', 'account_depo', 'type_of_securities', 'terms', 'type_of_accounting', 'quantity_of_securities', 'nominal_cost', 'bank'], 'required'],
            [['first_name', 'last_name', 'father_name', 'address', 'passport', 'type_of_securities', 'bank'], 'string', 'max' => 255],
            [['type', 'inn', 'account_depo', 'terms', 'type_of_accounting', 'quantity_of_securities'], 'integer', 'min' => 0],
            [['nominal_cost'], 'double', 'max' => $this->_user->balance, 'min' => 0.01],
            ['type', 'in', 'range' => array_keys(DepoAccountHelper::typeList())],
            ['account_depo', 'in', 'range' => array_keys(DepoAccountHelper::accountDepoList())],
            ['type_of_accounting', 'in', 'range' => array_keys(DepoAccountHelper::typeOfAccountingList())],
        ];
    }


    public function attributeLabels()
    {
        return [
            'type' => 'Тип',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'father_name' => 'Отчество',
            'address' => 'Адрес регистрации',
            'passport' => 'Паспорт',
            'inn' => 'ИНН',
            'account_depo' => 'Счет Депо',
            'type_of_securities' => 'Тип ценных бумаг',
            'terms' => 'Сроки',
            'type_of_accounting' => 'Тип учета',
            'quantity_of_securities' => 'Количество ценных бумаг',
            'nominal_cost' => 'Номинальная стоимость',
            'bank' => 'Банк',
        ];
    }



}
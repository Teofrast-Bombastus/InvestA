<?php

namespace shop\forms\manage\user;

use shop\entities\user\User;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class UserEditForm extends Model
{
    public $username;
    public $email;
    public $role;
    public $blocked;
    public $termin_percent;
    public $deal_percent;
    public $liquidity_percent;
    public $balance_deal;

    public $_user;

    public function __construct(User $user, array $config = [])
    {
        $this->username = $user->username;
        $this->email = $user->email;
        $this->blocked = $user->blocked;
        $this->termin_percent = $user->termin_percent;
        $this->deal_percent = $user->deal_percent;
        $this->liquidity_percent = $user->liquidity_percent;
        $this->balance_deal = $user->balance_deal;
        $roles = Yii::$app->authManager->getRolesByUser($user->id);
        $this->role = $roles ? reset($roles)->name : null;
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['username', 'email', 'role'], 'required'],
            ['email', 'email'],
            ['blocked', 'boolean'],
            ['balance_deal', 'number'],
            [['termin_percent', 'deal_percent', 'liquidity_percent',], 'number', 'min' => 0, 'max' => 100],
            [['email'], 'string', 'max' => 255],
            [['username', 'email'], 'unique', 'targetClass' => User::class, 'filter' => ['<>', 'id', $this->_user->id]],
        ];
    }

    public function rolesList(): array
    {
        $array = ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description');
        return $array;
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Email',
            'role' => 'Роль',
            'blocked' => 'Блокировать',
            'balance_deal' => 'Баланс / Сделка',
        ];
    }

}
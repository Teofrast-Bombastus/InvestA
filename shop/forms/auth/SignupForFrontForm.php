<?php
namespace shop\forms\auth;

use shop\entities\user\User;
use shop\helpers\UserHelper;
use yii\base\Model;


class SignupForFrontForm extends Model
{
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $phone;
    public $password1;
    public $password2;
    public $promo_code;
    public $type_account;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'email', 'phone', 'password1', 'promo_code', 'password2', 'type_account'], 'required'],
            [['username', 'first_name', 'last_name', 'phone'], 'trim'],
            [['username', 'first_name', 'last_name', 'phone'], 'string'],

            ['phone', 'replacePhone'],

            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Такой логин уже существует'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['type_account', 'integer'],
            ['type_account', 'in', 'range' => array_keys(UserHelper::accountTypeList())],

            ['promo_code',  'integer', 'min' => 0],
            ['promo_code', 'compare', 'compareValue' => 800, 'operator' => '==', 'message' => 'Неверный код'],

            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Такой Email уже существует'],

            [['password1', 'password2'], 'string', 'min' => 6],
            ['password2', 'compare', 'compareAttribute' => 'password1', 'message' => "Пароли не совпадают." ],
        ];
    }


    public function replacePhone()
    {
        $this->phone = str_replace(" ", "", $this->phone);
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'phone' => 'Телефон',
            'promo_code' => 'Промо код',
            'password1' => 'Пароль',
            'password2' => 'Повторить пароль',
            'email' => 'Email',
            'type_account' => 'Тип счета',
        ];
    }


}

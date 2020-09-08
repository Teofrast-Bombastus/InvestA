<?php
namespace shop\forms\auth;


use yii\base\Model;


class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;


    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string'],
            ['rememberMe', 'boolean'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

}
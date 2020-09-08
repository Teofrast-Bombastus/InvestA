<?php

namespace shop\forms\shop\order;


use Yii;
use yii\base\Model;

class OrderForm extends Model
{
    public $service_name;
    public $username;
    public $email;


    public function rules(): array
    {
        return [
            [['service_name', 'email', 'username'], 'required'],
            [['service_name', 'username'], 'string'],
            [['email'], 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('service', 'form_username'),
            'email' => 'Email',
        ];
    }

}
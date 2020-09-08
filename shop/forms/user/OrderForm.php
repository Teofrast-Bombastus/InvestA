<?php

namespace shop\forms\user;


use yii\base\Model;

class OrderForm extends Model
{
    public $amount;

    public function rules(): array
    {
        return [
            [['amount'], 'required'],
            [['amount'], 'double',  'min' => 0.01],
        ];
    }



    public function attributeLabels()
    {
        return [
            'amount' => 'Сумма',
        ];
    }



}
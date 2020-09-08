<?php

namespace shop\forms\shop;


use yii\base\Model;

class StrategyForm extends Model
{
    public $strategyName;
    public $phone;


    public function rules(): array
    {
        return [
            [['strategyName', 'phone',], 'required'],
            [['strategyName', 'phone'], 'string'],
            [['phone'], 'replacePhone'],
        ];
    }

    public function replacePhone()
    {
        return $this->phone = str_replace(' ', '', $this->phone);
    }


    public function attributeLabels()
    {
        return [
            'phone' => 'Телефон',
            'strategyName' => 'Стратегия',
        ];
    }

}
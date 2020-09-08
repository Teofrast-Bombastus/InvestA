<?php

namespace shop\entities\user\cabinet;

use shop\entities\user\UserResidentPay;
use yii\base\Model;

class ResidentPay extends Model
{
    public $price;
    public $notResidentPercent = 30;    // %
    public $residentPercent = 13;       // %
    public $type = 1;

    public function rules()
    {
        return [
            ['price', 'number'],
            ['price', 'required'],
            ['type', 'safe'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'price' => 'Сумма',
        ];
    }

    public function add($type = 0)
    {
        if (!$this->validate()) {
            return false;
        }
        $order = new UserResidentPay();
        $order->status = 0;
        $order->type = $type;
        $order->id_user = \Yii::$app->user->id;
        $order->price = $this->price;
        if (!$order->validate()) {
            return false;
        }
        $operation = Operation::create(\Yii::$app->user->id, Operation::STATUS_WAIT, time(), $this->price);
        if($type == UserResidentPay::NOT_RES) {
            $operation->type_operation = 'Уплата НДФЛ для нерезидентов';
        } else {
            $operation->type_operation = 'Уплата НДФЛ для резидентов';
        }
        $operation->save();
        $order->id_operation = $operation->id;

        return $order->save(false);
    }

}
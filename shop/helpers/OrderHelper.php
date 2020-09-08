<?php
namespace shop\helpers;

use shop\entities\user\cabinet\Order;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class OrderHelper
{
    public static function statusList(): array {
        return [
            Order::STATUS_NEW => 'Непотвержденный платеж',
            Order::STATUS_PAID => 'Успешно',
            Order::STATUS_FAILED => 'Ошибка платежа',
            Order::STATUS_COMPLETED => 'Завершен',
        ];
    }

    public static function getStatusName($value):string
    {
        return ArrayHelper::getValue(self::statusList(), $value);
    }


    public static function statusLabel($status) :string
    {
        switch ($status){
            case Order::STATUS_NEW:
                $class = 'label label-default';
                break;
            case Order::STATUS_PAID:
                $class = 'label label-success';
                break;
            case Order::STATUS_FAILED:
                $class = 'label label-danger';
                break;
            case Order::STATUS_COMPLETED:
                $class = 'label label-info';
                break;
            default:
                $class = 'label label-default';
        }
        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }




}
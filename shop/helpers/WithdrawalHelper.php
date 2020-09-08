<?php
namespace shop\helpers;

use shop\entities\user\cabinet\withdrawal\Status;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class WithdrawalHelper
{
    public static function statusList(): array {
        return [
            Status::STATUS_WAIT => 'Ожидание',
            Status::STATUS_SUCCESS => 'Успешно',
            Status::STATUS_REJECTED => 'Отклонено',
        ];
    }

    public static function getStatusName($value):string
    {
        return ArrayHelper::getValue(self::statusList(), $value);
    }


    public static function statusLabel($status) :string
    {
        switch ($status){
            case Status::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case Status::STATUS_SUCCESS:
                $class = 'label label-success';
                break;
            case Status::STATUS_REJECTED:
                $class = 'label label-danger';
                break;
            default:
                $class = 'label label-default';
        }
        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }



    public static function getTypeName($value):string
    {
        return ArrayHelper::getValue(self::typeList(), $value);
    }



}
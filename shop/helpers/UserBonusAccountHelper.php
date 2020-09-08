<?php
namespace shop\helpers;

use shop\entities\user\BonusAccount;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class UserBonusAccountHelper
{
    public static function statusList(): array {
        return [
            BonusAccount::STATUS_SUCCESS => 'Успешно',
        ];
    }

    public static function getStatusName($value):string
    {
        return ArrayHelper::getValue(self::statusList(), $value);
    }


    public static function statusLabel($status) :string
    {
        switch ($status){
            case BonusAccount::STATUS_SUCCESS:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }
        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }



    public static function typeList(): array {
        return [
            BonusAccount::TYPE_INPUT => 'Начисление на счет',
            BonusAccount::TYPE_OUTPUT => 'Списание со счета',
        ];
    }

    public static function getTypeName($value):string
    {
        return ArrayHelper::getValue(self::typeList(), $value);
    }



}
<?php
namespace shop\helpers;

use shop\entities\user\cabinet\DepoAccount;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class DepoAccountHelper
{
    public static function statusList(): array {
        return [
            DepoAccount::STATUS_WAIT => 'Ожидание',
            DepoAccount::STATUS_SUCCESS => 'Успешно',
            DepoAccount::STATUS_REJECTED => 'Отклонено',
        ];
    }

    public static function getStatusName($value):string
    {
        return ArrayHelper::getValue(self::statusList(), $value);
    }


    public static function statusLabel($status) :string
    {
        switch ($status){
            case DepoAccount::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case DepoAccount::STATUS_SUCCESS:
                $class = 'label label-success';
                break;
            case DepoAccount::STATUS_REJECTED:
                $class = 'label label-danger';
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
            DepoAccount::TYPE_CRYPTO_CURRENCY => 'Криптовалюта',
            DepoAccount::TYPE_STOCK_MARKET => 'Фондовый рынок',
            DepoAccount::TYPE_COMMODITY_MARKET => 'Товарно-сырьевой рынок',
            DepoAccount::TYPE_CURRENCY => 'Валюта',
        ];
    }

    public static function getTypeName($value):string
    {
        return ArrayHelper::getValue(self::typeList(), $value);
    }


    public static function accountDepoList(): array
    {
        return [
            DepoAccount::ACCOUNT_DEPO_INTERNAL => 'Внутренний',
            DepoAccount::ACCOUNT_DEPO_EXTERNAL => 'Внешний',
        ];
    }


    public static function getAccountDepoName($value): string
    {
        return ArrayHelper::getValue(self::accountDepoList(), $value);
    }


    public static function typeOfAccountingList(): array
    {
        return [
            DepoAccount::TYPE_OF_ACCOUNTING_PIECE => 'Поштучно',
            DepoAccount::TYPE_OF_ACCOUNTING_NOMINAL => 'По номиналу',
        ];
    }


    public static function getTypeOfAccountingName($value): string
    {
        return ArrayHelper::getValue(self::typeOfAccountingList(), $value);
    }



}
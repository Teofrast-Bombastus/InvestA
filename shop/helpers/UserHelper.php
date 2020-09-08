<?php
namespace shop\helpers;

use shop\entities\user\User;
use shop\entities\user\cabinet\UserProfile;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class UserHelper
{

    public static function showBalance($balance)
    {
        return number_format($balance, 2, '.', ' ');
    }

    public static function statusList(): array {
        return [
            User::STATUS_WAIT => 'Не активный',
            User::STATUS_ACTIVE => 'Активный',
        ];
    }


    public static function statusName($status):string {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status) :string
    {
        switch ($status){
            case User::STATUS_WAIT:
                $class = 'label label-default';
                break;
            case User::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }
        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }

    public static function verificationList(): array
    {
        return [
            '0' => 'Не верифицирован',
            '1' => 'Верифицирован',
        ];
    }


    public static function getVerificationName($value): string
    {
        return ArrayHelper::getValue(self::verificationList(), $value);
    }


    public static function verificationLabel($value) :string
    {
        if ($value){
            $class = 'label label-success';
        } else {
            $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::verificationList(), $value), [
            'class' => $class,
        ]);
    }


    public static function verificationListForFront(): array
    {
        return [
            '0' => 'не верифицирован',
            '1' => 'подтвержден',
        ];
    }


    public static function getVerificationNameForFront($value): string
    {
        return ArrayHelper::getValue(self::verificationListForFront(), $value);
    }



    public static function accountTypeList(): array {
        return [
            User::TYPE_ACCOUNT_TRADER => 'Трейдер',
            User::TYPE_ACCOUNT_BUSINESS => 'Бизнес',
            User::TYPE_ACCOUNT_INVESTOR => 'Инвестор',
        ];
    }

    public static function getAccountTypeName($value): string
    {
        return ArrayHelper::getValue(self::accountTypeList(), $value);
    }


    public static function verificationDocumentList(): array
    {
        return [
            '0' => 'Ожидает...',
            '1' => 'Верифицирован',
        ];
    }


    public static function getVerificationDocumentName($value): string
    {
        return ArrayHelper::getValue(self::verificationDocumentList(), $value);
    }


    public static function verificationDocumentLabel($value) :string
    {
        if ($value){
            $class = 'label label-success';
        } else {
            $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::verificationDocumentList(), $value), [
            'class' => $class,
        ]);
    }






    public static function userProfileStatusList(): array {
        return [
            UserProfile::STATUS_NEW => 'Новый',
            UserProfile::STATUS_VERIFY => 'Верифицированный',
        ];
    }


    public static function userProfileStatusLabel($status) :string
    {
        switch ($status){
            case UserProfile::STATUS_NEW:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }
        return Html::tag('span', ArrayHelper::getValue(self::userProfileStatusList(), $status), [
            'class' => $class,
        ]);
    }


    public static function userProfileStatusName($status):string {
        return ArrayHelper::getValue(self::userProfileStatusList(), $status);
    }


    public static function getRelationToGovernmentList(): array
    {
        return [
            UserProfile::RELATION_TO_GOVERNMENT_YES => 'Да',
            UserProfile::RELATION_TO_GOVERNMENT_NO => 'Нет',
        ];
    }

    public static function getRelationToGovernmentName($value): string
    {
        return ArrayHelper::getValue(self::getRelationToGovernmentList(), $value);
    }

    public static function getRelationToGovernmentLabel(): string
    {
        return 'Имеете ли вы отношение к правительству РФ на любом уровне?';
    }

    public static function getExperienceInFinanceList(): array
    {
        return [
            UserProfile::EXPERIENCE_IN_FINANCE_YES => 'Да',
            UserProfile::EXPERIENCE_IN_FINANCE_NO => 'Нет',
        ];
    }

    public static function getExperienceInFinanceName($value): string
    {
        return ArrayHelper::getValue(self::getExperienceInFinanceList(), $value);
    }

    public static function getExperienceInFinanceLabel(): string
    {
        return 'Имеется ли у Вас опыт работы на финансовых рынках?';
    }


    public static function getProfitList(): array
    {
        return [
            UserProfile::PROFIT_FROM_10000 => 'От 10000 до 30000 руб.',
            UserProfile::PROFIT_FROM_30000 => 'От 30000 до 80000 руб.',
            UserProfile::PROFIT_FROM_100000 => 'От 100000 до 300000 руб.',
            UserProfile::PROFIT_FROM_1000000 => 'От 1000000 руб.',
        ];
    }

    public static function getProfitName($value): string
    {
        return ArrayHelper::getValue(self::getProfitList(), $value);
    }

    public static function getProfitLabel(): string
    {
        return 'Ежемесячный доход';
    }


    public static function getSourcesOfProfitList(): array
    {
        return [
            UserProfile::SOURCE_PROFIT_JOB => 'Работа',
            UserProfile::SOURCE_PROFIT_PENSION => 'Пенсия',
            UserProfile::SOURCE_PROFIT_DEPOSIT => 'Депозиты',
        ];
    }

    public static function getSourcesOfProfitName($value): string
    {
        return ArrayHelper::getValue(self::getSourcesOfProfitList(), $value);
    }

    public static function getSourcesOfProfitLabel(): string
    {
        return 'Источники дохода';
    }


    public static function getMonthProfitList(): array
    {
        return [
            UserProfile::MONTH_PROFIT_FROM_50000 => '50000 руб.',
            UserProfile::MONTH_PROFIT_FROM_100000 => '100000 руб.',
            UserProfile::MONTH_PROFIT_FROM_500000 => '500000 руб.',
            UserProfile::MONTH_PROFIT_FROM_1000000 => 'От 1000000 руб.',
        ];
    }

    public static function getMonthProfitName($value): string
    {
        return ArrayHelper::getValue(self::getMonthProfitList(), $value);
    }

    public static function getMonthProfitLabel(): string
    {
        return 'Ежемесячный доход вас устроит в Invest aktiv Investment Group?';
    }


    public static function getTrustToBankList(): array
    {
        return [
            UserProfile::TRUST_TO_BANK_YES => 'Да',
            UserProfile::TRUST_TO_BANK_NO => 'Нет',
        ];
    }

    public static function getTrustToBankName($value): string
    {
        return ArrayHelper::getValue(self::getTrustToBankList(), $value);
    }

    public static function getTrustToBankLabel(): string
    {
        return 'Доверяете банкам?';
    }

    public static function getAgreeForSendEmailText(): string
    {
        return 'Даю согласие на получение писем информационного содержания посредством e-mail';
    }

    public static function getAgreeForSendEmailLabel(): string
    {
        return 'Даю согласие на получение писем';
    }

    public static function getConfirmInformationText(): string
    {
        return '<p class="first-line-confirm">Заявляю и подтверждаю, что:<p>
                    - вся информация, приведенная в данной анкете, является верной и корректной 
                      и в случае её изменения я обязуюсь уведомить об этом Компанию;
                    - я использую эту форму для регистрации себя в качестве владельца счета ИК Invest aktiv investment group;
                    - я являюсь фактическим владельцем средств, переведенных на счет;
                    - я прочёл/а, понял/а и согласен/а с "Политикой противодействия отмывания средств".';
    }

    public static function getConfirmInformationLabel(): string
    {
        return 'Заявляю и подтверждаю';
    }


}
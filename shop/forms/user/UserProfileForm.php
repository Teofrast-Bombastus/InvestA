<?php

namespace shop\forms\user;

use shop\entities\user\User;
use shop\entities\user\cabinet\UserProfile;
use shop\helpers\UserHelper;
use yii\base\Model;

class UserProfileForm  extends Model
{
    public $first_name;
    public $last_name;
    public $father_name;
    public $nationality;
    public $date;
    public $passport_serie_and_number;
    public $phone;
    public $email;
    public $job;
    public $company_name;
    public $position;
    public $family;
    public $hobby;
    public $relation_to_government;
    public $experience_in_finance;
    public $profit;
    public $sourcesOfProfit = [];
    public $month_profit;
    public $trust_to_bank;
    public $agree_for_send_email;
    public $confirm_information;

    public $_user;

    public function __construct(User $user, $config = [])
    {
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['first_name', 'last_name', 'father_name', 'nationality', 'date', 'passport_serie_and_number', 'phone', 'email'], 'required'],
            [['first_name', 'last_name', 'father_name', 'nationality', 'phone', 'passport_serie_and_number', 'job', 'company_name', 'position', 'family', 'hobby'], 'string', 'max' => 255],
            [['relation_to_government', 'experience_in_finance', 'trust_to_bank', 'agree_for_send_email', 'confirm_information'], 'boolean'],
            [['profit', 'month_profit'], 'integer'],
            ['profit', 'in', 'range' => $this->getProfitArray()],
            ['month_profit', 'in', 'range' => $this->getMonthProfitArray()],
            ['sourcesOfProfit', 'each', 'rule' => ['integer']],
            ['sourcesOfProfit', 'each', 'rule' => ['in', 'range' => $this->getSourcesOfProfitArray()]],
            ['phone', 'replacePhone'],
            ['email', 'email'],
            ['date', 'date', 'format' => 'php:d-m-Y'],
        ];
    }

    public function replacePhone()
    {
        $this->phone = str_replace(" ", "", $this->phone);
    }


    public function getProfitArray(): array
    {
        return [
            UserProfile::PROFIT_FROM_10000,
            UserProfile::PROFIT_FROM_30000,
            UserProfile::PROFIT_FROM_100000,
            UserProfile::PROFIT_FROM_1000000,
        ];
    }

    public function getMonthProfitArray(): array
    {
        return [
            UserProfile::MONTH_PROFIT_FROM_50000,
            UserProfile::MONTH_PROFIT_FROM_100000,
            UserProfile::MONTH_PROFIT_FROM_500000,
            UserProfile::MONTH_PROFIT_FROM_1000000,
        ];
    }

    public function getSourcesOfProfitArray(): array
    {
        return [
            UserProfile::SOURCE_PROFIT_JOB,
            UserProfile::SOURCE_PROFIT_PENSION,
            UserProfile::SOURCE_PROFIT_DEPOSIT,
        ];
    }


    public function attributeLabels()
    {
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'father_name' => 'Отчество',
            'nationality' => 'Гражданство',
            'date' => 'Дата',
            'day' => 'День',
            'month' => 'Месяц',
            'year' => 'Год',
            'passport_serie_and_number' => 'Серия и номер гражданского паспорта',
            'phone' => 'Телефон',
            'email' => 'Email',
            'job' => 'Место работы',
            'company_name' => 'Название организации',
            'position' => 'Должность',
            'family' => 'Семя',
            'hobby' => 'Хобби',
            'relation_to_government' => UserHelper::getRelationToGovernmentLabel(),
            'experience_in_finance' => UserHelper::getExperienceInFinanceLabel(),
            'profit' => UserHelper::getProfitLabel(),
            'sourcesOfProfit' => UserHelper::getSourcesOfProfitLabel(),
            'month_profit' => UserHelper::getMonthProfitLabel(),
            'trust_to_bank' => UserHelper::getTrustToBankLabel(),
            'agree_for_send_email' => UserHelper::getAgreeForSendEmailText(),
            'confirm_information' => UserHelper::getConfirmInformationLabel(),
        ];
    }



}
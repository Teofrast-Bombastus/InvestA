<?php

use shop\entities\user\cabinet\UserProfile;
use yii\widgets\DetailView;
use shop\helpers\UserHelper;

/* @var $this yii\web\View */
/* @var $model shop\entities\user\cabinet\UserProfile */

$this->title = 'Анкета от пользователя: ' . $model->user->first_name . ' ' . $model->user->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Верифакация пользователей', 'url' => ['user/user/verify-index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'Логин',
                        'attribute' => 'user.username',
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'value' => function (UserProfile $model) {
                            return UserHelper::userProfileStatusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'first_name',
                        'label' => 'Имя',
                    ],
                    [
                        'attribute' => 'last_name',
                        'label' => 'Фамилия',
                    ],
                    [
                        'attribute' => 'father_name',
                        'label' => 'Отчество',
                    ],
                    [
                        'attribute' => 'nationality',
                        'label' => 'Гражданство',
                    ],
                    [
                        'attribute' => 'date',
                        'label' => 'День рождения',
                        'format' => 'date',
                    ],
                    [
                        'attribute' => 'passport_serie_and_number',
                        'label' => 'Серия и номер паспорта',
                    ],
                    [
                        'attribute' => 'phone',
                        'label' => 'Телефон',
                    ],
                    [
                        'attribute' => 'email',
                        'label' => 'Email',
                    ],
                    [
                        'attribute' => 'job',
                        'label' => 'Место работы',
                        'value' => function (UserProfile $model) {
                            return $model->job ?: null;
                        },
                    ],
                    [
                        'attribute' => 'company_name',
                        'label' => 'Название организации',
                        'value' => function (UserProfile $model) {
                            return $model->company_name ?: null;
                        },
                    ],
                    [
                        'attribute' => 'position',
                        'label' => 'Должность',
                        'value' => function (UserProfile $model) {
                            return $model->position ?: null;
                        },
                    ],
                    [
                        'attribute' => 'family',
                        'label' => 'Семья',
                        'value' => function (UserProfile $model) {
                            return $model->family ?: null;
                        },
                    ],
                    [
                        'attribute' => 'hobby',
                        'label' => 'Хобби',
                        'value' => function (UserProfile $model) {
                            return $model->hobby ?: null;
                        },
                    ],
                    [
                        'attribute' => 'relation_to_government',
                        'label' => UserHelper::getRelationToGovernmentLabel(),
                        'value' => function (UserProfile $model) {
                            return $model->relation_to_government ? UserHelper::getRelationToGovernmentName($model->relation_to_government) : null;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'experience_in_finance',
                        'label' => UserHelper::getExperienceInFinanceLabel(),
                        'value' => function (UserProfile $model) {
                            return $model->experience_in_finance ? UserHelper::getExperienceInFinanceName($model->experience_in_finance) : null;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'profit',
                        'label' => UserHelper::getProfitLabel(),
                        'value' => function (UserProfile $model) {
                            return $model->profit ? UserHelper::getProfitName($model->profit) : null;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'sourcesOfProfit',
                        'label' => UserHelper::getSourcesOfProfitLabel(),
                        'value' => function (UserProfile $model) {
                            return $model->sourcesOfProfit ? implode(", ", array_map(function ($item){
                                return UserHelper::getSourcesOfProfitName($item);
                            }, $model->sourcesOfProfit)) : null;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'month_profit',
                        'label' => UserHelper::getMonthProfitLabel(),
                        'value' => function (UserProfile $model) {
                            return $model->month_profit ? UserHelper::getMonthProfitName($model->month_profit) : null;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'trust_to_bank',
                        'label' => UserHelper::getTrustToBankLabel(),
                        'value' => function (UserProfile $model) {
                            return $model->trust_to_bank ? UserHelper::getTrustToBankName($model->trust_to_bank) : null;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'agree_for_send_email',
                        'label' => UserHelper::getAgreeForSendEmailLabel(),
                        'value' => function (UserProfile $model) {
                            return $model->agree_for_send_email ? 'Да' : 'Нет';
                        },
                    ],
                    [
                        'attribute' => 'confirm_information',
                        'label' => UserHelper::getConfirmInformationLabel(),
                        'value' => function (UserProfile $model) {
                            return $model->confirm_information ? 'Да' : 'Нет';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>

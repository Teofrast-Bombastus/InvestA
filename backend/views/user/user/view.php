<?php

use shop\entities\user\User;
use shop\helpers\UserHelper;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model shop\entities\user\User */


$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">


    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [

                    [
                        'attribute' => 'username',
                        'label' => 'Пользователь',
                    ],
                    'email:email',
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'filter' => UserHelper::statusList(),
                        'value' => function (User $user) {
                            return UserHelper::statusLabel($user->status);
                        },
                        'format' => 'raw', //отключить фильтрацию через html encode
                    ],
                    [
                        'attribute' => 'account',
                        'label' => 'Счет',
                    ],
                    [
                        'attribute' => 'balance',
                        'label' => 'Баланс',
                        'value' => $model->getMainBalance() . ' ₽',
                    ],
                    [
                        'label' => 'Роль',
                        'value' => implode(', ', ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser($model->id), 'description')),
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
                        'attribute' => 'phone',
                        'label' => 'Телефон',
                    ],
                    [
                        'attribute' => 'type_account',
                        'label' => 'Тип счета',
                        'value' => UserHelper::getAccountTypeName($model->type_account)
                    ],
                    [
                        'attribute' => 'promo_code',
                        'label' => 'Промо код',
                    ],
                    [
                        'attribute' => 'blocked',
                        'label' => 'Заблокирован',
                        'value' => ($model->blocked) ? 'Да' : 'Нет',
                    ],
                    [
                        'attribute' => 'address',
                        'label' => 'Адрес',
                    ],
                    [
                        'attribute' => 'province',
                        'label' => 'Провинция',
                    ],
                    [
                        'attribute' => 'post_index',
                        'label' => 'Почтовый индекс',
                    ],
                    [
                        'attribute' => 'city',
                        'label' => 'Город',
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'updated_at',
                        'label' => 'Дата последнего изменения',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'balance_deal',
                        'label' => 'Баланс / Сделка ',
                    ],
                    [
                        'attribute' => 'termin_percent',
                        'label' => 'Кредит / Сделка %',
                    ],
                    [
                        'attribute' => 'deal_percent',
                        'label' => 'Кредит / д. Срок %',
                    ],
                    [
                        'attribute' => 'liquidity_percent',
                        'label' => 'Кредит / Ликвидность %',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>

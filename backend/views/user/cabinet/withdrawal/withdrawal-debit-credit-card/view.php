<?php

use shop\entities\user\cabinet\withdrawal\WithdrawalDebitCreditCard;
use shop\entities\user\cabinet\withdrawal\Status;
use shop\helpers\WithdrawalHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model WithdrawalDebitCreditCard */

$this->title = 'Вывод средств со счета: №' . $model->user_account . ' ('. $model->user->first_name . ' ' . $model->user->last_name . ')';
$this->params['breadcrumbs'][] = ['label' => 'Вывод средств (На дебетовую или кредитную карту)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <?php if ($model->status == Status::STATUS_WAIT): ?>
        <p>
            <?= Html::a('Подтвердить', ['success', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'data' => [
                    'confirm' => 'Вы действительно подтверждаете это действие?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Отклонить', ['reject', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно подтверждаете это действие?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>


    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'value' => function (WithdrawalDebitCreditCard $model) {
                            return WithdrawalHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Логин пользователя',
                        'attribute' => 'user.username',
                        'value' => function (WithdrawalDebitCreditCard $model) {
                            return Html::a($model->user->username, ['/user/user/view', 'id' => $model->user->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'user_account',
                        'label' => 'Счет',
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
                        'attribute' => 'email',
                        'label' => 'Email',
                    ],
                    [
                        'attribute' => 'address',
                        'label' => 'Адрес',
                    ],
                    [
                        'attribute' => 'card_number',
                        'label' => 'Номер карты',
                    ],
                    [
                        'attribute' => 'card_holder',
                        'label' => 'Владелец карты',
                    ],
                    [
                        'attribute' => 'expire',
                        'label' => 'Срок действия',
                    ],
                    [
                        'attribute' => 'amount',
                        'label' => 'Сумма',
                    ],

                ],
            ]) ?>
        </div>
    </div>
</div>

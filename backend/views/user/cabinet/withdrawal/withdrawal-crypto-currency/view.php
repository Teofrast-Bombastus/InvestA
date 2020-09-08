<?php

use shop\entities\user\cabinet\withdrawal\WithdrawalCryptoCurrency;
use shop\entities\user\cabinet\withdrawal\Status;
use shop\helpers\WithdrawalHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model WithdrawalCryptoCurrency */

$this->title = 'Вывод средств со счета: №' . $model->user_account . ' ('. $model->user->first_name . ' ' . $model->user->last_name . ')';
$this->params['breadcrumbs'][] = ['label' => 'Вывод средств (Криптовалюта)', 'url' => ['index']];
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
                        'value' => function (WithdrawalCryptoCurrency $model) {
                            return WithdrawalHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Логин пользователя',
                        'attribute' => 'user.username',
                        'value' => function (WithdrawalCryptoCurrency $model) {
                            return Html::a($model->user->username, ['/user/user/view', 'id' => $model->user->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'user_account',
                        'label' => 'Счет',
                    ],
                    [
                        'attribute' => 'address',
                        'label' => 'Адрес',
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

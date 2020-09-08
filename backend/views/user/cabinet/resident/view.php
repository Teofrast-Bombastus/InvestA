<?php

use shop\entities\user\UserResidentPay;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = 'НДФЛ';
?>
<div class="user-view">

    <?php if ($model->status == 0): ?>
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
                        'value' => function($model) {
                            return (new DateTime($model->created_at))->format('H:i d.m.Y');
                        }
                    ],
                    [
                        'attribute' => 'price',
                        'label' => 'Сумма',
                    ],
                    [
                        'attribute' => 'type',
                        'label' => 'Тип',
                        'value' => function ($model) {
                            if ($model->type == UserResidentPay::NOT_RES) {
                                return 'Не резидент';
                            }
                            if ($model->type == UserResidentPay::RES) {
                                return 'Резидент';
                            }
                            return '';
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'value' => function (UserResidentPay $model) {
                            $class = 'label label-default';
                            $title = 'Ожидание';
                            if ($model->status == 1) {
                                $title = 'Успешно';
                                $class = 'label label-success';
                            }
                            if ($model->status == 2) {
                                $title = 'Отклонено';
                                $class = 'label label-danger';
                            }
                            return Html::tag('span', $title, ['class' => $class,]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Пользователь',
                        'value' => function (UserResidentPay $model) {
                            return $model->user->first_name . ' ' . $model->user->last_name;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Логин пользователя',
                        'attribute' => 'user.username',
                        'value' => function (UserResidentPay $model) {
                            return Html::a($model->user->username, ['/user/user/view', 'id' => $model->user->id]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>

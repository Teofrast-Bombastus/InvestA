<?php

use shop\entities\user\cabinet\UserCredit;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

//$this->title = 'Кредит : №' . $model->user_account . ' ('. $model->user->first_name . ' ' . $model->user->last_name . ')';
$this->title = 'Кредит';
$this->params['breadcrumbs'][] = ['label' => 'Вывод средств (Банковский перевод)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
                    'id',
                    [
                        'attribute' => 'dataType.title',
                        'label' => 'Тип',
                    ],
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
                        'attribute' => 'percent',
                        'label' => 'Процент',
                        'value' => function ($model) {
                            return $model->percent . ' %';
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'value' => function (UserCredit $model) {
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
                        'value' => function (UserCredit $model) {
                            return $model->user->first_name . ' ' . $model->user->last_name;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Логин пользователя',
                        'attribute' => 'user.username',
                        'value' => function (UserCredit $model) {
                            return Html::a($model->user->username, ['/user/user/view', 'id' => $model->user->id]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>

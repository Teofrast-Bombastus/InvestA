<?php


use kartik\date\DatePicker;
use shop\entities\user\UserResidentPay;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\user\WithdrawalBankTransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Запросы на кредит';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => 'first_name',
                        'label' => 'Имя',
                        'value' => function (UserResidentPay $model) {
                            return Html::a(Html::encode($model->user->first_name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'last_name',
                        'label' => 'Фамилия',
                        'value' => function (UserResidentPay $model) {
                            return Html::a(Html::encode($model->user->last_name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'username',
                        'label' => 'Логин',
                        'value' => function (UserResidentPay $model) {
                            return Html::a(Html::encode($model->user->username), ['/user/user/view', 'id' => $model->user->id]);
                        },
                        'format' => 'raw',
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
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'date_from',
                            'attribute2' => 'date_to',
                            'type' => DatePicker::TYPE_RANGE,
                            'separator' => '-',
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                            ],
                        ]),
                        'value' => function($model) {
                            return (new DateTime($model->created_at))->format('H:i d.m.Y');
                        }

                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'filter' => $searchModel->statusList(),
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
                ],
            ]); ?>
        </div>
    </div>
</div>

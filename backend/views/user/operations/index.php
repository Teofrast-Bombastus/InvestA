<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use shop\entities\user\User;


/* @var $this yii\web\View */
/* @var $searchModel backend\forms\user\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model User */

$this->title = 'История операций пользователей';
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
                        'attribute' => 'username',
                        'label' => 'Логин',
                        'value' => function (User $model) {
                            return Html::a(Html::encode($model->username), ['user/user/view', 'id' => $model->id]);
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
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'account',
                        'label' => 'Счет',
                    ],
                    [
                        'attribute' => 'balance',
                        'label' => 'Баланс',
                        'value' => function (User $user) {
                            return $user->balance . ' ₽';
                        },
                    ],
                    [
                        'label' => 'Действие',
                        'value' => function (User $user) {
                            return Html::a('История операций', ['history', 'user_id' => $user->id]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

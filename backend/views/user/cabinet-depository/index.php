<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use backend\widgets\grid\RoleColumn;
use yii\grid\GridView;
use shop\entities\user\User;
use shop\helpers\UserHelper;


/* @var $this yii\web\View */
/* @var $searchModel backend\forms\user\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
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
                            return Html::a(Html::encode($model->username), ['/user/user/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'first_name',
                        'label' => 'Имя',
                        'value' => function (User $model) {
                            return Html::a(Html::encode($model->first_name), ['/user/user/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'last_name',
                        'label' => 'Фамилия',
                        'value' => function (User $model) {
                            return Html::a(Html::encode($model->last_name), ['/user/user/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'phone',
                        'label' => 'Телефон',
                    ],
                    'email',
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
                        'attribute' => 'role',
                        'label' => 'Роль',
                        'class' => RoleColumn::class,
                        'filter' => $searchModel->rolesList(),
                    ],
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
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{update}',
                        'buttons' =>
                        [
                            'update' => function ($url, $model, $key) {
                                return  Html::a('Обновить', ['update', 'id_user' => $model->id]) ;
                            },

                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

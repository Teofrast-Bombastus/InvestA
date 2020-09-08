<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use backend\widgets\grid\RoleColumn;
use yii\grid\GridView;
use shop\entities\user\User;
use shop\helpers\UserHelper;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel backend\forms\user\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Верификация пользователей';
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
                            return Html::a(Html::encode($model->username), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'first_name',
                        'label' => 'Имя',
                        'value' => function (User $model) {
                            return Html::a(Html::encode($model->first_name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'last_name',
                        'label' => 'Фамилия',
                        'value' => function (User $model) {
                            return Html::a(Html::encode($model->last_name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Анкета',
                        'value' => function (User $model) {
                            return $model->userProfile ? Html::a('Анкета', ['user/profile/view', 'id' => $model->userProfile->id]) : null;
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Документы',
                        'value' => function (User $model) {
                            return $model->documents ? Html::a('Документы', ['user/user/documents', 'id' => $model->id]) : null;
                        },
                        'format' => 'raw',
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
                        'attribute' => 'verified',
                        'label' => 'Верификация',
                        'filter' => UserHelper::verificationList(),
                        'value' => function (User $user) {
                            return UserHelper::verificationLabel($user->verified);
                        },
                        'format' => 'raw', //отключить фильтрацию через html encode
                    ],
                    [
                        'label' => 'Действие',
                        'value' => function (User $user) {

                            if (!$user->verified){
                                return  Html::a('Верифицировать', Url::to(['verify', 'id' => $user->id]), [
                                    'class' => 'btn btn-success',
                                    'data' => [
                                        'confirm' => 'Вы подтверждаете действия?',
                                        'method' => 'post',
                                    ],
                                ]);
                            }

                            return  Html::a('Снять верификацию', Url::to(['un-verify', 'id' => $user->id]), [
                                'class' => 'btn btn-primary',
                                'data' => [
                                    'confirm' => 'Вы подтверждаете действия?',
                                    'method' => 'post',
                                ],
                            ]);

                        },
                        'format' => 'raw', //отключить фильтрацию через html encode
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

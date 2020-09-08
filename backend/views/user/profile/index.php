<?php

use kartik\date\DatePicker;
use shop\entities\user\cabinet\UserProfile;
use yii\helpers\Html;
use yii\grid\GridView;
use shop\helpers\UserHelper;


/* @var $this yii\web\View */
/* @var $searchModel backend\forms\user\UserProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Анкеты пользователей';
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
                        'label' => 'Имя',
                        'attribute' => 'first_name',
                        'value' => function (UserProfile $model) {
                            return Html::a(Html::encode($model->first_name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Фамилия',
                        'attribute' => 'last_name',
                        'value' => function (UserProfile $model) {
                            return Html::a(Html::encode($model->last_name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Отчество',
                        'attribute' => 'father_name',
                        'value' => function (UserProfile $model) {
                            return Html::a(Html::encode($model->father_name), ['view', 'id' => $model->id]);
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
                        'attribute' => 'username',
                        'label' => 'Создатель',
                        'value' => function (UserProfile $model) {
                            return Html::a(Html::encode($model->user->username), ['user/user/view', 'id' => $model->user_id]);
                        },
                        'format' => 'raw'
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'filter' => $searchModel->statusList(),
                        'value' => function (UserProfile $userProfile) {
                            return UserHelper::userProfileStatusLabel($userProfile->status);
                        },
                        'format' => 'raw', //отключить фильтрацию через html encode
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

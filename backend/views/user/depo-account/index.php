<?php

use kartik\date\DatePicker;
use shop\entities\user\cabinet\DepoAccount;
use shop\helpers\DepoAccountHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use shop\helpers\UserHelper;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel backend\forms\user\DepoAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Счета Депо';
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
                        'value' => function (DepoAccount $model) {
                            return Html::a(Html::encode($model->first_name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'last_name',
                        'label' => 'Фамилия',
                        'value' => function (DepoAccount $model) {
                            return Html::a(Html::encode($model->last_name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'username',
                        'label' => 'Логин',
                        'value' => function (DepoAccount $model) {
                            return Html::a(Html::encode($model->user->username), ['/user/user/view', 'id' => $model->user->id]);
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
                        'attribute' => 'type',
                        'label' => 'Тип',
                        'filter' => $searchModel->typeList(),
                        'value' => function (DepoAccount $model) {
                            return DepoAccountHelper::getTypeName($model->type);
                        },
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'filter' => $searchModel->statusList(),
                        'value' => function (DepoAccount $model) {
                            return DepoAccountHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

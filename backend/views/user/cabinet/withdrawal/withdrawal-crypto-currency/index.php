<?php


use kartik\date\DatePicker;
use shop\entities\user\cabinet\withdrawal\WithdrawalCryptoCurrency;
use shop\helpers\WithdrawalHelper;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\forms\user\WithdrawalCryptoCurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вывод средств (Криптовалюта)';
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
                        'attribute' => 'address',
                        'label' => 'Адрес',
                        'value' => function (WithdrawalCryptoCurrency $model) {
                            return Html::a(Html::encode($model->address), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'username',
                        'label' => 'Логин',
                        'value' => function (WithdrawalCryptoCurrency $model) {
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
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'filter' => $searchModel->statusList(),
                        'value' => function (WithdrawalCryptoCurrency $model) {
                            return WithdrawalHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

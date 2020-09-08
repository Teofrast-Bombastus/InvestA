<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use shop\entities\user\cabinet\Operation;


/* @var $this yii\web\View */
/* @var $model shop\forms\manage\user\BonusAccountForm */
/* @var $user shop\entities\user\User */

$this->title = 'История операций по счету №' . $user->account . ' (' . $user->first_name . ' ' .$user->last_name . ')';
$this->params['breadcrumbs'][] = ['label' => 'История операций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-create">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => new ArrayDataProvider([
                            'models' => $user->operations,
                        ]),
                        'columns' => [
                            [
                                'attribute' => 'id',
                                'label' => '№',
                            ],
                            [
                                'attribute' => 'type_operation',
                                'label' => 'Тип операции',
                                'format' => 'raw',
                            ],
                            [
                                'attribute' => 'status',
                                'label' => 'Статус',
                            ],
                            [
                                'attribute' => 'amount',
                                'label' => 'Сума',
                            ],
                            [
                                'attribute' => 'created_at',
                                'label' => 'Дата создания',
                                'format' => 'datetime',
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>

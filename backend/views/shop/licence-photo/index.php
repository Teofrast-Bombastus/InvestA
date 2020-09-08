<?php


use shop\entities\shop\LicencePhoto;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Лицензии';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">
    <p>
        <?= Html::a('Добавить новую лицензию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'label' => 'Фото',
                        'value' => function (LicencePhoto $model) {
                            return $model->image ? Html::a(Html::img($model->getThumbFileUrl('image', 'admin')), ['view', 'id' => $model->id]) : null;
                        },
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 100px'],
                    ],
                    [
                        'label' => 'Показывать на главном экране',
                        'attribute' => 'show_in_index',
                        'value' => function (LicencePhoto $model) {
                            return $model->show_in_index ? 'Показывать' : 'Не показывать';
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

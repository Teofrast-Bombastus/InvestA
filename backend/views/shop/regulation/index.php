<?php


use shop\entities\shop\Regulation;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel backend\forms\shop\RegulationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Нормативные документы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">
    <p>
        <?= Html::a('Добавить новый документ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'label' => 'Файл',
                        'attribute' => 'file',
                        'value' => function (Regulation $model) {
                            return Html::a($model->file, ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Показывать на главном экране',
                        'attribute' => 'show_in_index',
                        'value' => function (Regulation $model) {
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

<?php


use kartik\file\FileInput;
use shop\entities\shop\InvestmentFile;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $investmentForm shop\forms\manage\shop\InvestmentForm */

$this->title = 'Файлы инвестиций';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'label' => 'Файл',
                        'attribute' => 'file',
                        'value' => function (InvestmentFile $model) {
                            return Html::a($model->file, $model->getUploadedFileUrl('file'), ['target' => '_blank']);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                        'template' => '{delete}',
                    ],
                ],
            ]); ?>
        </div>
    </div>


    <div class="box">
        <div class="box-header with-border">
            <h3>Добавить файлы</h3>
        </div>
        <div class="box-body">

            <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data'],
            ]); ?>

            <?= $form->field($investmentForm, 'files[]')->label(false)->widget(FileInput::class, [
                'options' => [
                    'accept' => '.doc, .docx, .pdf, .xlsx, .xls',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'browseOnZoneClick' => true,
                ],
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>

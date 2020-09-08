<?php

use kartik\file\FileInput;
use shop\entities\user\cabinet\CabinetFile;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model shop\forms\manage\user\CabinetFilesForm */

$this->title = 'Файлы для кабинета пользователя';
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
                        'value' => function (CabinetFile $model) {
                            return Html::a($model->file, $model->getUploadedFileUrl('file'), ['target' => '_blank']);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Тип',
                        'attribute' => 'type',
                        'value' => function (CabinetFile $model) {
                            if ($model->type == 'credit') {
                                return 'Кредит';
                            }
                            if ($model->type == 'ndfl') {
                                return 'НДФЛ';
                            }
                            return '';
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
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <div class="col-md-6">
                <?= $form->field($model, 'type')
                    ->radioList(['' => 'Для кабинета', 'credit' => 'Для кредитов', 'ndfl' => 'Для НДФЛ'])
                    ->label('Предназначение фала') ?>
            </div>
            <br>
            <div class="clearfix"></div>
            <?= $form->field($model, 'files[]')->label(false)->widget(FileInput::class, [
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

<?php


use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\shop\RegulationForm */
/* @var $regulation shop\entities\shop\Regulation|null */


?>
<div class="article">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>


    <div class="box box-default">
        <div class="box-header with-border">Общие</div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="showInIndex">Показывать на главной странице</label>
                    <?= $form->field($model, 'showInIndex')->checkbox(['id' => 'showInIndex']) ?>
                </div>
            </div>
        </div>
    </div>


    <div class="box box-default">
        <div class="box-header with-border">
            <h3>Файл</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <?php if (isset($regulation)): ?>
                    <?php if ($regulation->file): ?>
                        <div class="col-md-2 col-xs-3" style="text-align: center">
                            <div class="btn-group">
                                <?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['delete-file', 'id' => $regulation->id], [
                                    'class' => 'btn btn-default',
                                    'data-method' => 'post',
                                    'data-confirm' => 'Удалить файл?',
                                ]); ?>
                            </div>
                            <div>
                                <p><?= $regulation->getAttribute('file') ?></p>
                            </div>
                        </div>
                    <?php else: ?>

                        <div class="col-md-12">
                            <?= $form->field($model, 'file')->widget(FileInput::class, [
                                'options' => [
                                    'accept' => '.doc, .docx, .pdf, .xlsx, .xls',
                                ],
                                'pluginOptions' => [
                                    'browseOnZoneClick' => true,
                                ],
                            ]) ?>
                        </div>

                    <?php endif; ?>
                <?php else: ?>

                    <div class="col-md-12">
                        <?= $form->field($model, 'file')->widget(FileInput::class, [
                            'options' => [
                                'accept' => '.doc, .docx, .pdf, .xlsx, .xls',
                            ],
                            'pluginOptions' => [
                                'browseOnZoneClick' => true,
                            ],
                        ]) ?>
                    </div>

                <?php endif; ?>
            </div>


        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

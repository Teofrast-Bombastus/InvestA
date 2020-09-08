<?php


use kartik\widgets\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\shop\StrategyForm*/
/* @var $strategy shop\entities\shop\Strategy|null */


?>
<div class="article">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>


    <div class="box box-default">
        <div class="box-header with-border">Общие</div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'description')->widget(CKEditor::class) ?>
                </div>
            </div>
        </div>
    </div>


    <div class="box box-default">
        <div class="box-header with-border">
            <h3>Фото</h3>
            <h5 class="text-muted">Рекомендованый размер: ширина - 1270px; высота - 750px; </h5>
        </div>
        <div class="box-body">
            <div class="row">
                <?php if (isset($strategy)): ?>
                    <?php if ($strategy->image): ?>
                        <div class="col-md-2 col-xs-3" style="text-align: center">
                            <div class="btn-group">
                                <?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['delete-photo', 'id' => $strategy->id], [
                                    'class' => 'btn btn-default',
                                    'data-method' => 'post',
                                    'data-confirm' => 'Remove photo?',
                                ]); ?>
                            </div>
                            <div>
                                <?= Html::a(
                                    Html::img($strategy->getThumbFileUrl('image', 'preview')),
                                    $strategy->getUploadedFileUrl('image'),
                                    ['class' => 'thumbnail', 'target' => '_blank']
                                ) ?>
                            </div>
                        </div>
                    <?php else: ?>

                        <div class="col-md-12">
                            <?= $form->field($model, 'image')->widget(FileInput::class, [
                                'options' => [
                                    'accept' => 'image/*',
                                ],
                                'pluginOptions' => [
                                    'browseOnZoneClick' => true,
                                ],
                            ]) ?>
                        </div>

                    <?php endif; ?>
                <?php else: ?>

                    <div class="col-md-12">
                        <?= $form->field($model, 'image')->widget(FileInput::class, [
                            'options' => [
                                'accept' => 'image/*',
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

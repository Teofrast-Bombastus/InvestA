<?php

use kartik\file\FileInput;
use shop\entities\shop\aboutUs\GalleryFile;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $aboutUs shop\entities\shop\aboutUs\AboutUs */
/* @var $galleryPhotosForm shop\forms\manage\shop\aboutUs\GalleryPhotosForm */
/* @var $galleryFilesForm shop\forms\manage\shop\aboutUs\GalleryFileForm */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $aboutUs->id], ['class' => 'btn btn-primary']) ?>
    </p>


    <div class="box">
        <div class="box-header with-border">Описание</div>
        <div class="box-body">
            <?= Yii::$app->formatter->asHtml($aboutUs->description, [
                'Attr.AllowedRel' => array('nofollow'),
                'HTML.SafeObject' => true,
                'Output.FlashCompat' => true,
                'HTML.SafeIframe' => true,
                'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
            ]) ?>
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

            <?= $form->field($galleryFilesForm, 'files[]')->label(false)->widget(FileInput::class, [
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


    <div class="box" id="files">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-header with-border">
                    <h3>Все файли</h3>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="box-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            [
                                'label' => 'Файл',
                                'attribute' => 'file',
                                'value' => function (GalleryFile $model) {
                                    return Html::a($model->file, $model->getUploadedFileUrl('file'), ['target' => '_blank']);
                                },
                                'format' => 'raw',
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Действия',
                                'template' => '{delete}',
                                'urlCreator' => function ($action, $model, $key, $index) use ($aboutUs) {
                                    if ($action === 'delete') {
                                        $url = Url::to(['delete-file', 'id' => $aboutUs->id, 'file_id' => $model->id]);
                                        return $url;
                                    }

                                },
                            ],

                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="box" id="photos">
        <div class="box-header with-border">
            <h3>Добавить фото</h3>
            <h5 class="text-muted">Рекомендованый размер: ширина - 1280px; высота - 720px; </h5>
        </div>
        <div class="box-body">

            <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data'],
            ]); ?>

            <?= $form->field($galleryPhotosForm, 'photos[]')->label(false)->widget(FileInput::class, [
                'options' => [
                    'accept' => 'image/*',
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


    <div class="box">
        <div class="row">
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h3>Все фото</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($aboutUs->photos as $photo): ?>
                <div class="col-md-2 col-xs-3" style="text-align: center">
                    <div class="btn-group">
                        <?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['delete-photo', 'id' => $aboutUs->id, 'photo_id' => $photo->id], [
                            'class' => 'btn btn-default',
                            'data-method' => 'post',
                            'data-confirm' => 'Remove photo?',
                        ]); ?>
                    </div>
                    <div>
                        <?= Html::a(
                            Html::img($photo->getThumbFileUrl('image', 'preview')),
                            $photo->getUploadedFileUrl('image'),
                            ['class' => 'thumbnail', 'target' => '_blank']
                        ) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>




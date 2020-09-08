<?php


use kartik\file\FileInput;
use shop\entities\shop\cooperation\GalleryFile;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $cooperation shop\entities\shop\cooperation\Cooperation */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $galleryFilesForm shop\forms\manage\shop\cooperation\GalleryFileForm */


$this->title = 'Условия сотрудничества';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $cooperation->id], ['class' => 'btn btn-primary']) ?>
    </p>


    <div class="box">
        <div class="box-header with-border">Описание</div>
        <div class="box-body">
            <?= Yii::$app->formatter->asHtml($cooperation->description, [
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
                                'urlCreator' => function ($action, $model, $key, $index) use ($cooperation) {
                                    if ($action === 'delete') {
                                        $url = Url::to(['delete-file', 'id' => $cooperation->id, 'file_id' => $model->id]);
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


</div>

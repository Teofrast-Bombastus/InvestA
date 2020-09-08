<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $asset shop\entities\shop\Asset */



$this->title = $asset->title;
$this->params['breadcrumbs'][] = ['label' => 'Все активы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $asset->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $asset->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">Общие</div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $asset,
                        'attributes' => [
                            [
                                'label' => 'Название',
                                'attribute' => 'title',
                            ],
                            [
                                'label' => 'Краткое описание',
                                'attribute' => 'sub_title',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

    </div>

    <div class="box">
        <div class="box-header with-border">Описание</div>
        <div class="box-body">
            <?= Yii::$app->formatter->asHtml($asset->description, [
                'Attr.AllowedRel' => array('nofollow'),
                'HTML.SafeObject' => true,
                'Output.FlashCompat' => true,
                'HTML.SafeIframe' => true,
                'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
            ]) ?>
        </div>
    </div>


    <div class="box" id="photos">
        <div class="box-header with-border">Фото</div>
        <div class="box-body">

            <div class="row">
                <?php if ($asset->image): ?>
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div>
                            <?= Html::a(
                                Html::img($asset->getThumbFileUrl('image', 'preview')),
                                $asset->getUploadedFileUrl('image'),
                                ['class' => 'thumbnail', 'target' => '_blank']
                            ) ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</div>

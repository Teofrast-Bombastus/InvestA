<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $licencePhoto shop\entities\shop\LicencePhoto */



$this->title = 'Просмотр лицензии';
$this->params['breadcrumbs'][] = ['label' => 'Все лицензии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $licencePhoto->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $licencePhoto->id], [
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
                        'model' => $licencePhoto,
                        'attributes' => [
                            [
                                'label' => 'Показывать на главном экране',
                                'attribute' => 'show_in_index',
                                'value' => $licencePhoto->show_in_index ? 'Показывать' : 'Не показывать',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

    </div>



    <div class="box" id="photos">
        <div class="box-header with-border">Фото</div>
        <div class="box-body">

            <div class="row">
                <?php if ($licencePhoto->image): ?>
                    <div class="col-md-10 col-xs-10" style="text-align: center">
                        <div>
                            <?= Html::a(
                                Html::img($licencePhoto->getThumbFileUrl('image', 'preview')),
                                $licencePhoto->getUploadedFileUrl('image'),
                                ['class' => 'thumbnail', 'target' => '_blank']
                            ) ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>




</div>

<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $regulation shop\entities\shop\Regulation */



$this->title = 'Просмотр файла';
$this->params['breadcrumbs'][] = ['label' => 'Все нормативные документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $regulation->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $regulation->id], [
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
                        'model' => $regulation,
                        'attributes' => [
                            [
                                'label' => 'Показывать на главном экране',
                                'attribute' => 'show_in_index',
                                'value' => $regulation->show_in_index ? 'Показывать' : 'Не показывать',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

    </div>



    <div class="box" id="photos">
        <div class="box-header with-border">Файл</div>
        <div class="box-body">

            <div class="row">
                <?php if ($regulation->file): ?>
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div>
                            <a href="<?= $regulation->getUploadedFileUrl('file') ?>" target="_blank"><?= $regulation->file ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>




</div>

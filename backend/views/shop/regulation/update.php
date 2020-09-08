<?php

/* @var $this yii\web\View */
/* @var $regulation shop\entities\shop\Regulation */
/* @var $model shop\forms\manage\shop\RegulationForm */

$this->title = 'Изменить документ ';
$this->params['breadcrumbs'][] = ['label' => 'Все документы', 'url' => ['index']];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'regulation' => $regulation,
    ]) ?>

</div>

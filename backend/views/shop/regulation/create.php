<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\shop\RegulationForm */

$this->title = 'Создать новый нормативный документ';
$this->params['breadcrumbs'][] = ['label' => 'Все документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\shop\AssetForm */

$this->title = 'Добавить новый актив';
$this->params['breadcrumbs'][] = ['label' => 'Все активы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

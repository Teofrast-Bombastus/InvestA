<?php

/* @var $this yii\web\View */
/* @var $asset shop\entities\shop\Asset */
/* @var $model shop\forms\manage\shop\AssetForm */

$this->title = 'Изменить актив: ' . $asset->title;
$this->params['breadcrumbs'][] = ['label' => 'Все активы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $asset->title, 'url' => ['view', 'id' => $asset->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'asset' => $asset,
    ]) ?>

</div>

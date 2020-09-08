<?php

/* @var $this yii\web\View */
/* @var $strategy shop\entities\shop\Strategy */
/* @var $model shop\forms\manage\shop\StrategyForm */

$this->title = 'Изменить стратегию: ' . $strategy->title;
$this->params['breadcrumbs'][] = ['label' => 'Все стратегии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $strategy->title, 'url' => ['view', 'id' => $strategy->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'strategy' => $strategy,
    ]) ?>

</div>

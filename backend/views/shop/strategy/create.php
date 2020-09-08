<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\shop\StrategyForm */

$this->title = 'Добавить новую стратегию';
$this->params['breadcrumbs'][] = ['label' => 'Все стратегии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

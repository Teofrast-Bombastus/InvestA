<?php

/* @var $this yii\web\View */
/* @var $cashFlow shop\entities\shop\cashFlow\CashFlow */
/* @var $model shop\forms\manage\shop\cashFlow\CashFlowForm */

$this->title = 'Изменить информацию ввод-вывод средств';
$this->params['breadcrumbs'][] = ['label' => 'Ввод-вывод средств', 'url' => ['view', 'id' => $cashFlow->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

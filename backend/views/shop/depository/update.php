<?php

/* @var $this yii\web\View */
/* @var $depository shop\entities\shop\depository\Depository */
/* @var $model shop\forms\manage\shop\depository\DepositoryForm */

$this->title = 'Изменить депозитарий';
$this->params['breadcrumbs'][] = ['label' => 'Депозитарий', 'url' => ['view', 'id' => $depository->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

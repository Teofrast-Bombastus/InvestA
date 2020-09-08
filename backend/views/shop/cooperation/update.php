<?php

/* @var $this yii\web\View */
/* @var $cooperation shop\entities\shop\cooperation\Cooperation */
/* @var $model shop\forms\manage\shop\cooperation\CooperationForm */

$this->title = 'Изменить информацию условия сотрудничества';
$this->params['breadcrumbs'][] = ['label' => 'Условия сотрудничества', 'url' => ['view', 'id' => $cooperation->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

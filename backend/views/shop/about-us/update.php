<?php

/* @var $this yii\web\View */
/* @var $aboutUs shop\entities\shop\aboutUs\AboutUs */
/* @var $model shop\forms\manage\shop\aboutUs\AboutUsForm */

$this->title = 'Изменить информацию о нас';
$this->params['breadcrumbs'][] = ['label' => 'О нас', 'url' => ['view', 'id' => $aboutUs->id]];
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

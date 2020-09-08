<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\shop\LicencePhotoForm */

$this->title = 'Создать новую лицензию';
$this->params['breadcrumbs'][] = ['label' => 'Все лицензии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

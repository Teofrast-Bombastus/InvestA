<?php

/* @var $this yii\web\View */
/* @var $licencePhoto shop\entities\shop\LicencePhoto */
/* @var $model shop\forms\manage\shop\LicencePhotoForm */

$this->title = 'Изменить лицензию';
$this->params['breadcrumbs'][] = ['label' => 'Все лицензии', 'url' => ['index']];

?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'licencePhoto' => $licencePhoto,
    ]) ?>

</div>

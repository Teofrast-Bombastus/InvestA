<?php

/* @var $this yii\web\View */
/* @var $phone shop\entities\other\contacts\Phone */
/* @var $model shop\forms\manage\other\contacts\PhoneForm */

$this->title = 'Изменить телефон: ' . $phone->text;
$this->params['breadcrumbs'][] = ['label' => 'Телефон', 'url' => ['index']];
?>
<div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

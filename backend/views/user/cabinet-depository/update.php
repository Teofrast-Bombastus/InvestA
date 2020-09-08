<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $depository shop\forms\manage\user\CabinetDepositoryForm */

$this->title = 'Изменить депозитарий/единый реестр аукционеров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-update">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Пользователь :
                        <?= $depository->user->first_name . ' ' . $depository->user->last_name .
                        ' (' . $depository->user->username . ')' ?>
                    </h4>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($depository, 'description')->widget(CKEditor::class) ?>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

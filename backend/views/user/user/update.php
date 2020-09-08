<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\user\UserEditForm */
/* @var $user shop\entities\user\User */

$this->title = 'Изменить пользователя: ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->username, 'url' => ['view', 'id' => $user->id]];
?>
<div class="user-update">

    <?php $form = ActiveForm::begin(); ?>

    <!--        --><?php //= $form->field($model,'username')->textInput(['maxLength' => true]); ?>
    <!--        --><?php //= $form->field($model,'email')->textInput(['maxLength' => true]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'role')->dropDownList($model->rolesList()) ?>
            <?= $form->field($model, 'blocked')->dropDownList([0 => 'Нет', 1 => 'Да'], ['options' => [$model->blocked => ['selected' => true]]]) ?>
            <?= $form->field($model, 'balance_deal')
                ->textInput(['type' => 'text'])
                ->label('Баланс / Сделка') ?>

        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'deal_percent')
                        ->textInput(['type' => 'text'])
                        ->label('Кредит / Сделка %') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'termin_percent')
                        ->textInput(['type' => 'text'])
                        ->label('Кредит / д. Срок %') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'liquidity_percent')
                        ->textInput(['type' => 'text'])
                        ->label('Кредит / Ликвидность %') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

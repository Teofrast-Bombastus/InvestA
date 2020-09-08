<?php

use kartik\widgets\ActiveForm;
use shop\helpers\WithdrawalHelper;
use yii\helpers\Url;


/* @var  $this yii\web\View; */
/* @var  $model shop\forms\user\cabinet\withdrawal\WithdrawalBankTransferForm */


$this->title = 'Вывод средств';
$this->params['active_url'] = Url::to(['cabinet/cash/output']);

?>


<h2>Банковский перевод > Вывод средств</h2>

<div class="open-account-wrap output-money">
    <?php $form = ActiveForm::begin(['id' => 'form-login-page']); ?>
    <div class="open-depo-min-wrapper-form">
        <div class="profile-info-page-form-block">

            <div class="profile-info-page-form-block">
                <p class="profile-form-title">Паспортные данные</p>

                <?= $form->field($model, 'first_name')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('first_name')])->label(false) ?>

                <?= $form->field($model, 'last_name')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('last_name')])->label(false) ?>

            </div>

            <div class="profile-info-page-form-block">
                <p class="profile-form-title">Контакты</p>

                <?= $form->field($model, 'phone')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('phone'), 'data-mask' => 'callback-catalog-phone'])->label(false) ?>

                <?= $form->field($model, 'email')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('email')])->label(false) ?>

                <?= $form->field($model, 'address')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('address')])->label(false) ?>

            </div>


            <div class="profile-info-page-form-block">
                <p class="profile-form-title">Реквизиты</p>

                <?= $form->field($model, 'bank_account')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('bank_account')])->label(false) ?>

                <?= $form->field($model, 'bank_name')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('bank_name')])->label(false) ?>

                <?= $form->field($model, 'bank_address')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('bank_address')])->label(false) ?>

                <?= $form->field($model, 'swift')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('swift')])->label(false) ?>

                <?= $form->field($model, 'iban')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('iban')])->label(false) ?>

                <?= $form->field($model, 'amount')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('amount')])->label(false) ?>

            </div>

        </div>
    </div>
    <div class="submit_btn_wrapper">
        <p class="submit_left">
            <button type="submit" class="button">
                Отправить
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
                </span>
            </button>
        </p>
    </div>
    <?php ActiveForm::end() ?>
</div>



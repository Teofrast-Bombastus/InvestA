<?php

/* @var  $this yii\web\View; */
/* @var  $model shop\forms\user\DepoAccountForm */
/* @var  $type integer */

$this->title = 'Открыть счет';

use kartik\widgets\ActiveForm;
use shop\helpers\DepoAccountHelper;
use yii\helpers\Url;

?>



<h2><?= DepoAccountHelper::getTypeName($type) ?> > Открыть Счет Депо</h2>


<div class="open-account-wrap">
    <?php $form = ActiveForm::begin(['id' => 'form-login-page']); ?>
        <div class="open-depo-min-wrapper-form">
            <div class="profile-info-page-form-block">

                <?= $form->field($model, 'first_name')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('first_name')])->label(false) ?>

                <?= $form->field($model, 'last_name')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('last_name')])->label(false) ?>

                <?= $form->field($model, 'father_name')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('father_name')])->label(false) ?>

                <?= $form->field($model, 'address')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('address')])->label(false) ?>

                <?= $form->field($model, 'passport')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('passport')])->label(false) ?>

                <?= $form->field($model, 'inn')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('inn')])->label(false) ?>

                <?= $form->field($model, 'account_depo', ['options' => ['class' => 'depo-select-wrap']])->dropDownList(DepoAccountHelper::accountDepoList(), ["class" => "input", "prompt" => $model->getAttributeLabel('account_depo')])->label(false) ?>

                <?= $form->field($model, 'type_of_securities')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('type_of_securities')])->label(false) ?>

                <?= $form->field($model, 'terms')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('terms')])->label(false) ?>

                <?= $form->field($model, 'type_of_accounting', ['options' => ['class' => 'depo-select-wrap']])->dropDownList(DepoAccountHelper::typeOfAccountingList(), ["class" => "input", "prompt" => $model->getAttributeLabel('type_of_accounting')])->label(false) ?>

                <?= $form->field($model, 'quantity_of_securities')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('quantity_of_securities')])->label(false) ?>

                <?= $form->field($model, 'nominal_cost')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('nominal_cost')])->label(false) ?>

                <?= $form->field($model, 'bank')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('bank')])->label(false) ?>

            </div>
        </div>
        <div class="submit_btn_wrapper">
            <p class="submit_left">
                <button type="submit" class="button">
                    Открыть
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
                    </span>
                </button>
            </p>
        </div>
    <?php ActiveForm::end() ?>
</div>

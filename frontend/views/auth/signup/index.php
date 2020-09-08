<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model shop\forms\auth\SignupForFrontForm */

use shop\helpers\UserHelper;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
    <div class="row">
        <div class="col-12 main_text_col form-enter-column">
            <div class="autoriation-form-wrapper registration-wrapper">
                <h1>Регистрация</h1>
                <div class="only_text background_shadow">
                    <div class="feetback_form_wrapper form_registrated">
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'first_name')->textInput(["class" => "input", "placeholder" => "Имя"])->label(false) ?>

                        <?= $form->field($model, 'last_name')->textInput(["class" => "input", "placeholder" => "Фамилия"])->label(false) ?>

                        <?= $form->field($model, 'username')->textInput(["class" => "input", "placeholder" => "Логин"])->label(false) ?>

                        <?= $form->field($model, 'phone')->textInput(["class" => "input", "placeholder" => "Телефон", "data-mask" => "callback-catalog-phone"])->label(false) ?>

                        <?= $form->field($model, 'email')->textInput(["class" => "input", "placeholder" => "Email"])->label(false) ?>

                        <?= $form->field($model, 'password1')->passwordInput(["class" => "input", "placeholder" => "Пароль"])->label(false) ?>

                        <?= $form->field($model, 'password2')->passwordInput(["class" => "input", "placeholder" => "Подтвердите пароль"])->label(false) ?>

                        <?= $form->field($model, 'promo_code')->textInput(["class" => "input", "placeholder" => "Промокод"])->label(false) ?>

                        <?= $form->field($model, 'type_account', ['options' => ['class' => 'depo-select-wrap']])->dropDownList(UserHelper::accountTypeList(), ["class" => "input", 'prompt' => 'Тип счета'])->label(false) ?>

                        <p class="autorization-input-wrap">
                            <label class="my-checkbox">
                                <input type="checkbox" class="checkbox visually-hidden" id="vd-auotorization" checked>
                                <span class="my-checkbox-text">
                                    Регистрируясь на портале 
                                    Инвест Актив,
                                    я подтверждаю, что ознакомлен с
                                    <a href="/img/docs/open.pdf" target="blank">
                                         Договором на открытие и обслуживание депозитария.pdf,
                                    </a>
                                   <a href="/img/docs/doc_about.pdf" target="blank">
                                        Договором об открытие расчетного счета,
                                   </a>
                                    <a href="/img/docs/brock.pdf" target="blank">
                                        Соглашением о брокерском обслуживание,
                                   </a>
                                    и согласен с ними.
                                </span>
                            </label>
                            <span class="hint">
                                Нужно согласиться с условиями использования сайта
                            </span>
                        </p>

                        <div class="submit_btn_wrapper">
                            <button type="submit" class="button" name="signup-button">Далее</button>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

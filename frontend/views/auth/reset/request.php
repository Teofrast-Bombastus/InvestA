<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model shop\forms\auth\PasswordResetRequestForm */


use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container">
    <div class="row">
        <div class="col-12 main_text_col form-enter-column">
            <div class="autoriation-form-wrapper get-new-password">
                <h1><?= $this->title ?></h1>
                <div class="only_text background_shadow">
                    <div class="feetback_form_wrapper form_registrated">
                        <?php $form = ActiveForm::begin(['id' => 'form-request']); ?>

                        <?= $form->field($model, 'email')->textInput(['class' => 'input', 'placeholder' => 'Email'])->label("Для восстановления пароля введите свой E-mail") ?>

                        <div class="submit_btn_wrapper">
                            <button type="submit" class="button">
                                Отправить
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
                                </span>
                            </button>
                        </div>
                        <div class="get-new-password-support">
                            <ul class="get-new-password-support-list">
                                <li>
                                    <a href="<?= Url::to(['/signup']) ?>">
                                        Регистрация
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/login']) ?>">
                                        Авторизация
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
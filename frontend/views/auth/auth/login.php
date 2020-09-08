<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model shop\forms\auth\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Вход на сайт';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container autoriation-container">
    <div class="row">
        <div class="col-12 main_text_col form-enter-column">
            <div class="autoriation-form-wrapper">
                <h1>Авторизация</h1>
                <div class="only_text background_shadow">
                    <div class="feetback_form_wrapper form_registrated">
                        <?php $form = ActiveForm::begin(['id' => 'form-login-page']); ?>

                        <?= $form->field($model, 'username')->textInput(["class" => "input", "placeholder" => "Логин"])->label(false) ?>

                        <?= $form->field($model, 'password')->passwordInput(["class" => "input", "placeholder" => "Пароль"])->label(false) ?>

                        <div class="submit_btn_wrapper">
                            <p class="submit_left">
                                <button type="submit" class="button">
                                    Войти
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
                                    </span>
                                </button>
                            </p>
                            <p class="submit_right">
                                <a href="<?= Url::to(['/signup']) ?>" class="button-border-style">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g><g><path fill="#011241" d="M11.527 7.15l-3.425 3.426a1.218 1.218 0 0 1-1.725 0L4.474 8.672a1.22 1.22 0 1 1 1.725-1.725l1.04 1.04 2.563-2.563a1.22 1.22 0 0 1 1.725 1.726zM8 0C3.59 0 0 3.59 0 8s3.59 8 8 8c4.412 0 8-3.59 8-8s-3.588-8-8-8z"/></g></g></svg>
                                    </span>
                                    Регистрация
                                </a>
                            </p>
                        </div>
                        <?php ActiveForm::end(); ?>
                        <div class="enter_title">
                            <p class="enter_title-forget-password">
                                <a href="<?= Url::to(['/request']) ?>">Забыли логин или пароль?</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

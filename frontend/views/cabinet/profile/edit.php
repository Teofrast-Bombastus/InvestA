<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\User\UserEditForm */
/* @var $userProfileForm shop\forms\user\UserProfileForm */
/* @var $user shop\entities\user\User */

use shop\helpers\UserHelper;
use kartik\form\ActiveForm;
use yii\helpers\Url;

$this->params['active_url'] = Url::to(['cabinet/profile/edit']);

$this->title = 'Изменения персональной информиции';

$templateOptionsRadioField = ['template' => "{hint}\n<div class=\"vd-page-info-radio-wrap\">{input}</div>\n<div class=\"error-wrap\">{error}</div>",];
$templateOptionsCheckboxField = ['template' => "{hint}\n<div class=\"vd-page-info-checkbox-wrap\">{input}</div>\n<div class=\"error-wrap\">{error}</div>",];

$templateOptionsRadioItemField = ['item' => function ($index, $label, $name, $checked, $value) {

    $return = '<div class="vd-page-info-radio-item">';
    $return .= '<label class="vd-radio">';
    $return .= '<input type="radio" name="' . $name . '" value="' . $value . '">';
    $return .= '<span>' . $label . '</span>';
    $return .= '</label>';
    $return .= '</div>';

    return $return;
}
];

$templateOptionsCheckboxItemField = ['item' => function ($index, $label, $name, $checked, $value) {

    $return = '<div class="vd-page-info-checkbox-item">';
    $return .= '<label class="vd-checkbox">';
    $return .= '<input type="checkbox" name="' . $name . '" value="' . $value . '">';
    $return .= '<span>' . $label . '</span>';
    $return .= '</label>';
    $return .= '</div>';

    return $return;
}
];


?>


<h1>Информация о клиенте</h1>
<div class="tabs-wrapper">
    <div class="tabs-nav">
        <ul class="tabs-list">
            <li class="active"><a href="#tab1">Личные данные</a></li>
            <li><a href="#tab2">Анкета</a></li>
        </ul>
    </div>
    <section class="tabs-content">
        <div id="tab1" class="tab-body">
            <div class="profile profile_page--main">
                <div class="profile-info-page-form-wrapper">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="profile-info-page-form-block">
                        <p class="profile-form-title">Паспортные данные</p>
                        <?= $form->field($model, 'first_name')->textInput(["class" => "input", "placeholder" => "Имя"])->label() ?>
                        <?= $form->field($model, 'last_name')->textInput(["class" => "input", "placeholder" => "Фамилия"]) ?>
                    </div>
                    <div class="profile-info-page-form-block">
                        <p class="profile-form-title">Контакты</p>
                        <?= $form->field($model, 'phone')->textInput(["class" => "input", "data-mask" => "callback-catalog-phone", "placeholder" => "Номер телефона"]) ?>
                    </div>
                    <div class="profile-info-page-form-block">
                        <p class="profile-form-title">Местожительства</p>
                        <?= $form->field($model, 'address')->textInput(["class" => "input", "placeholder" => "Адрес"]) ?>
                        <?= $form->field($model, 'province')->textInput(["class" => "input", "placeholder" => "Провинция"]) ?>
                        <?= $form->field($model, 'postIndex')->textInput(["class" => "input", "placeholder" => "Индекс"]) ?>
                    </div>
                    <div class="profile-info-page-form-block">
                        <p class="profile-form-title">Счет</p>
                        <?= $form->field($model, 'type_account', ['options' => ['class' => 'depo-select-wrap']])->dropDownList(UserHelper::accountTypeList(),["class" => "input", 'prompt' => $model->getAttributeLabel('type_account')])->label(false) ?>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="button">
                        Сохранить
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
                        </span>
                    </button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div id="tab2" class="tab-body">
            <?php if (empty($user->userProfile)): ?>
                <div class="user-profile-form">
                    <?php $form = ActiveForm::begin(); ?>
                        <div class="profile-info-page-form-block hidden-label">
                            <p class="profile-form-title">Паспортные данные</p>
                            <?= $form->field($userProfileForm, 'first_name')->textInput(["class" => "input", "placeholder" => "Имя"]) ?>
                            <?= $form->field($userProfileForm, 'last_name')->textInput(["class" => "input", "placeholder" => "Фамилия"]) ?>
                            <?= $form->field($userProfileForm, 'father_name')->textInput(["class" => "input", "placeholder" => "Отчество"]) ?>
                            <?= $form->field($userProfileForm, 'nationality')->textInput(["class" => "input", "placeholder" => "Гражданство"]) ?>
                            <div class="date-profile-select">
                                <?= $form->field($userProfileForm, 'date')->hiddenInput(['id' => 'profile-date'])->label(false) ?>
                            </div>
                            <?= $form->field($userProfileForm, 'passport_serie_and_number')->textInput(["class" => "input", "placeholder" => "Серия и номер гражданского паспорта"]) ?>
                        </div>
                        <div class="profile-info-page-form-block hidden-label">
                            <p class="profile-form-title">Контакты</p>
                            <?= $form->field($userProfileForm, 'phone')->textInput(["class" => "input", "placeholder" => "Номер телефона", "data-mask" => "callback-catalog-phone"]) ?>
                            <?= $form->field($userProfileForm, 'email')->textInput(["class" => "input", "placeholder" => "E-mail"]) ?>
                        </div>
                        <div class="profile-info-page-form-block hidden-label">
                            <p class="profile-form-title">Работа</p>
                            <?= $form->field($userProfileForm, 'job')->textInput(["class" => "input", "placeholder" => "Место работы"]) ?>
                            <?= $form->field($userProfileForm, 'company_name')->textInput(["class" => "input", "placeholder" => "Название организации"]) ?>
                            <?= $form->field($userProfileForm, 'position')->textInput(["class" => "input", "placeholder" => "Должность"]) ?>
                        </div>
                        <div class="profile-info-page-form-block hidden-label">
                            <p class="profile-form-title">Дополнительно</p>
                            <?= $form->field($userProfileForm, 'family')->textInput(["class" => "input", "placeholder" => "Семья"]) ?>
                            <?= $form->field($userProfileForm, 'hobby')->textInput(["class" => "input", "placeholder" => "Хобби"]) ?>
                        </div>
                        <div class="profile-info-page-form-checkbox-block profile-info-page-form-title">
                            <?= $form->field($userProfileForm, 'relation_to_government', $templateOptionsRadioField)->radioList(UserHelper::getRelationToGovernmentList(), $templateOptionsRadioItemField)->hint($userProfileForm->getAttributeLabel('relation_to_government'))->label(false) ?>
                        </div>
                        <div class="profile-info-page-form-checkbox-block profile-info-page-form-title">
                            <?= $form->field($userProfileForm, 'experience_in_finance', $templateOptionsRadioField)->radioList(UserHelper::getExperienceInFinanceList(), $templateOptionsRadioItemField)->hint($userProfileForm->getAttributeLabel('experience_in_finance'))->label(false) ?>
                        </div>
                        <div class="profile-info-page-form-checkbox-block profile-info-page-form-title">
                            <?= $form->field($userProfileForm, 'profit', $templateOptionsRadioField)->radioList(UserHelper::getProfitList(), $templateOptionsRadioItemField)->hint($userProfileForm->getAttributeLabel('profit'))->label(false) ?>
                         </div>
                        <div class="profile-info-page-form-checkbox-block profile-info-page-form-title">
                            <?= $form->field($userProfileForm, 'sourcesOfProfit', $templateOptionsCheckboxField)->checkboxList(UserHelper::getSourcesOfProfitList(), $templateOptionsCheckboxItemField)->hint($userProfileForm->getAttributeLabel('sourcesOfProfit'))->label(false) ?>
                         </div>
                        <div class="profile-info-page-form-checkbox-block profile-info-page-form-title">
                            <?= $form->field($userProfileForm, 'month_profit', $templateOptionsRadioField)->radioList(UserHelper::getMonthProfitList(), $templateOptionsRadioItemField)->hint($userProfileForm->getAttributeLabel('month_profit'))->label(false) ?>
                         </div>
                        <div class="profile-info-page-form-checkbox-block profile-info-page-form-title">
                            <?= $form->field($userProfileForm, 'trust_to_bank', $templateOptionsRadioField)->radioList(UserHelper::getTrustToBankList(), $templateOptionsRadioItemField)->hint($userProfileForm->getAttributeLabel('trust_to_bank'))->label(false) ?>
                        </div>
                        <div class="profile-info-page-form-checkbox-block profile-info-page-form-title">
                            <?= $form->field($userProfileForm, 'agree_for_send_email', $templateOptionsCheckboxField)->checkbox([
                                    'template' => '<div class="vd-page-info-checkbox-item">{input}{label}{error}</div>'
                            ])->label() ?>
                        </div>
                        <div class="profile-info-page-form-checkbox-block profile-info-page-form-title">
                            <?= $form->field($userProfileForm, 'confirm_information',)->checkbox([
                                'template' => '<div class="vd-page-info-checkbox-item">{input}{label}{error}</div>'
                            ])->label() ?>
                            <ul class="declare-list">
                                <li>
                                    вся информация, приведенная в данной анкете, является верной и корректной <br>
                                    и в случае её изменения я обязуюсь уведомить об этом Компанию;
                                </li>
                                <li>
                                    я использую эту форму для регистрации себя в качестве владельца счета ООО Инвестактив;
                                </li>
                                <li>
                                    я являюсь фактическим владельцем средств, переведенных на счет;
                                </li>
                                <li>
                                    я прочёл/а, понял/а и согласен/а с "Политикой противодействия отмывания средств".
                                </li>
                            </ul>
                        </div>
                        <div class="form-group questionnaire-button-wrapper">
                         <button type="submit" class="button">
                            Отправить анкету
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
                            </span>
                        </button>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            <?php else: ?>
                <div class="user-profile-empty">
                    <h2>Анкета уже отправлена</h2>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>






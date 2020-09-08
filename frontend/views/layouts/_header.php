<?php

use shop\helpers\ContactHelper;
use shop\helpers\UserHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $this yii\web\View */
/** @var $content string */

?>


<header class="site-header">
    <div class="site-header-top-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-md-6 col-sm-8 site-header-top-col">
                    <p class="site-header-top-item">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"><g><g><g><path fill="#d99a05" d="M13.337 13.619a.317.317 0 0 0-.074.629c3.33.392 5.104 1.448 5.104 2.06 0 .86-3.373 2.059-8.867 2.059-5.494 0-8.867-1.2-8.867-2.059 0-.612 1.774-1.668 5.104-2.06a.317.317 0 0 0-.074-.63C2.329 14.013 0 15.119 0 16.309 0 17.646 3.263 19 9.5 19s9.5-1.354 9.5-2.692c0-1.19-2.329-2.296-5.663-2.69z"/></g><g><path fill="#d99a05" d="M9.5 3.8a2.22 2.22 0 0 1 2.217 2.217A2.22 2.22 0 0 1 9.5 8.233a2.22 2.22 0 0 1-2.217-2.216A2.22 2.22 0 0 1 9.5 3.8zm-.056 13.54l4.858-7.017c1.822-2.429 1.559-6.422-.564-8.544A6.032 6.032 0 0 0 9.444 0 6.033 6.033 0 0 0 5.15 1.779C3.027 3.9 2.764 7.894 4.579 10.314z"/></g></g></g></svg>
                        </span>
                        <?= Html::encode(ContactHelper::getAddress()->text) ?>
                    </p>
                    <p class="site-header-top-item">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"><g><g><g><path fill="#d99a05" d="M9.401 12.283h1.114v1.113H9.4z"/></g><g><path fill="#d99a05" d="M3.835 7.83h1.113v1.113H3.835z"/></g><g><path fill="#d99a05" d="M9.401 0h1.114v3.34H9.4z"/></g><g><path fill="#d99a05" d="M9.401 7.83h1.114v1.113H9.4z"/></g><g><path fill="#d99a05" d="M3.835 0h1.113v3.34H3.835z"/></g><g><path fill="#d99a05" d="M3.835 12.283h1.113v1.113H3.835z"/></g><g><path fill="#d99a05" d="M14.968 7.83h1.113v1.113h-1.113z"/></g><g><path fill="#d99a05" d="M17.194 10.057h-3.34v-3.34h3.34zm0 4.453h-3.34v-3.34h3.34zm-5.566-4.453h-3.34v-3.34h3.34zm0 4.453h-3.34v-3.34h3.34zm-5.566-4.453h-3.34v-3.34h3.34zm0 4.453h-3.34v-3.34h3.34zM17.194 4.453h-3.34V2.227h-2.226v2.226h-3.34V2.227H6.062v2.226h-3.34V2.227H.458v13.396h19V2.227h-2.264z"/></g><g><path fill="#d99a05" d="M14.968 12.283h1.113v1.113h-1.113z"/></g><g><path fill="#d99a05" d="M14.968 0h1.113v3.34h-1.113z"/></g><g><path fill="#d99a05" d="M.458 16.736h19V19h-19z"/></g></g></g></svg>
                        </span>
                        Пн - Cб: 9:00 - 20:00. Воскресенье выходной
                    </p>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-6 col-sm-4 site-header-top-col site-header-top-phone">
                    <p class="site-header-top-item">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"><g><g><g><path fill="#d99a05" d="M18.8 14.77a.669.669 0 0 1-.009.949c-.568.566-1.134 1.131-1.702 1.7l-4.386-4.389c.1-.07.193-.145.278-.23l.692-.696.751-.75h.003a.68.68 0 0 1 .954-.004l3.418 3.42zm-9.227-1.33c.588.505 1.437.603 2.15.339l4.505 4.504c-1.076 1.05-3.749.923-6.1-.224-1.008-.492-1.927-1.127-2.798-1.79a23.933 23.933 0 0 1-2.444-2.154 25.126 25.126 0 0 1-2.146-2.45c-.661-.87-1.3-1.787-1.794-2.803C-.202 6.515-.336 3.844.712 2.766l4.503 4.505c-.264.713-.165 1.561.341 2.146.62.722 1.274 1.409 1.941 2.08a38.482 38.482 0 0 0 2.076 1.943zM5.964 6.29zM1.577 1.9L3.276.2a.674.674 0 0 1 .949-.008l3.418 3.42a.676.676 0 0 1-.004.956l-.748.747-.697.697a1.92 1.92 0 0 0-.23.278z"/></g></g></g></svg>
                        </span>
                        <a href="tel:<?= str_replace([' ', '-', '_', '(', ')'], '', Html::encode(ContactHelper::getPhone()->text)); ?>"><?= Html::encode(ContactHelper::getPhone()->text); ?></a>
                    </p>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <ul class="mkvs-list-enter">
                            <li class="item-sign-up">
                        <p class="mkvs-enter">
                            <a href="<?= Url::to(['/login']) ?>" class="button-border-style user-enter">
                            <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g><g><g><path fill="#fff" d="M10.339 8.666a.678.678 0 0 0-.69.667V12a.679.679 0 0 1-.689.666H6.893v-10c0-.569-.375-1.077-.94-1.267l-.203-.066h3.21c.38 0 .69.3.69.667v2c0 .368.308.667.689.667.381 0 .69-.3.69-.667V2c0-1.103-.929-2-2.069-2H1.55c-.025 0-.047.011-.073.015C1.444.012 1.412 0 1.38 0 .619 0 0 .598 0 1.333v12c0 .57.375 1.078.939 1.267l4.148 1.338c.14.042.28.062.427.062.76 0 1.379-.598 1.379-1.334V14H8.96c1.14 0 2.068-.898 2.068-2V9.333a.678.678 0 0 0-.69-.667z"/></g><g><path fill="#fff" d="M15.78 6.257L12.772 3.25a.752.752 0 0 0-1.283.531v2.255H8.482a.752.752 0 0 0 0 1.504h3.007v2.255a.753.753 0 0 0 1.283.532L15.78 7.32a.75.75 0 0 0 0-1.063z"/></g></g></g></svg>
                            </span>
                                Кабинет
                            </a>
                        </p>
                            </li>
                            <li>
                        <p class="mkvs-registration">
                            <a href="<?= Url::to(['/signup']) ?>" class="user-registration button">
                                Регистрация
                            </a>
                        </p>
                            </li>
                        </ul>
                    <?php else: ?>
                        <div class="mkvs-user-account-info">
                            <p class="mkvs-user-authorization">
                                <a href="<?= Url::to(['cabinet/default/index']) ?>" class="mkvs-toggle-drop">
                                    <span class="user-icon icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"><g><g><g><g><path fill="#fff" d="M8.737 9.713c1.266 0 2.346-.448 3.242-1.344.895-.895 1.343-1.976 1.343-3.242s-.448-2.346-1.343-3.242C11.083.99 10.003.542 8.737.542S6.39.99 5.495 1.885c-.896.896-1.344 1.976-1.344 3.242S4.6 7.474 5.495 8.37c.896.896 1.976 1.344 3.242 1.344z"/></g><g><path fill="#fff" d="M17.101 14.554a12.227 12.227 0 0 0-.167-1.301c-.084-.466-.19-.898-.317-1.296a6.144 6.144 0 0 0-.513-1.164 4.193 4.193 0 0 0-.74-.967 3.117 3.117 0 0 0-1.021-.639 3.59 3.59 0 0 0-1.332-.239c-.071 0-.239.086-.501.257-.263.171-.56.362-.89.573-.33.21-.76.402-1.29.573-.529.171-1.06.257-1.594.257a5.153 5.153 0 0 1-1.594-.257c-.529-.17-.959-.362-1.29-.573-.33-.21-.626-.402-.889-.573-.262-.171-.43-.257-.501-.257-.486 0-.93.08-1.332.239-.402.16-.742.372-1.02.639-.28.267-.526.589-.74.967a6.153 6.153 0 0 0-.514 1.164c-.127.398-.233.83-.317 1.296-.083.466-.139.9-.167 1.301-.028.403-.042.814-.042 1.236 0 .956.291 1.71.872 2.263.581.553 1.354.83 2.317.83h10.436c.963 0 1.735-.277 2.317-.83.58-.553.871-1.307.871-2.263 0-.422-.014-.833-.042-1.236z"/></g></g></g></g></svg>
                                    </span>
                                    <?= Yii::$app->user->identity->getFullName() ?>
                                    <span class="drop-down-icon icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"><g><g><path fill="#fff" d="M9.5 1.874V0L4.844 3.748.13 0v1.874l4.713 3.748z"/></g></g></svg>
                                    </span>
                                </a>
                            </p>
                            <div class="mkvs-user-info-dropdown">
                                <div class="mkvs-user-emai">
                                    <a href=<?= Url::to(['/cabinet']) ?>>
                                       Личный кабинет
                                    </a>
                                </div>
                                <p class="mkvs-status">
                                    Статус: <span> <?= UserHelper::getVerificationNameForFront(Yii::$app->user->identity->verified) ?></span>
                                </p>
                                <div class="mkvs-user-balance">
                                    <p class="mkvs-user-balance-label">
                                        Баланс: <?= UserHelper::showBalance(Yii::$app->user->identity->balance) ?> ₽
                                    </p>
                                    <p class="mkvs-user-balance-label">
                                        Счет: <?= Yii::$app->user->identity->account ?>
                                    </p>
                                </div>
                                <p class="mkvs-logout">
                                    <a href="<?= Url::to(['/logout']) ?>" class="button-border-style">
                                        <span class="logout-icon icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16"><g><g><g><path d="M10.21 8.667a.666.666 0 0 0-.667.666V12a.667.667 0 0 1-.667.667h-2v-10c0-.57-.363-1.078-.908-1.268l-.197-.066h3.105c.368 0 .667.3.667.667v2a.666.666 0 1 0 1.333 0V2c0-1.103-.897-2-2-2H1.709c-.025 0-.046.011-.07.015C1.605.012 1.574 0 1.542 0 .807 0 .209.598.209 1.333v12c0 .57.363 1.078.908 1.268l4.012 1.337c.136.042.272.062.414.062.735 0 1.333-.598 1.333-1.333V14h2c1.103 0 2-.897 2-2V9.333a.666.666 0 0 0-.667-.666z"/></g><g><path d="M16.014 6.195L13.347 3.53A.667.667 0 0 0 12.21 4v2H9.543a.667.667 0 0 0 0 1.333h2.666v2a.668.668 0 0 0 1.138.472l2.667-2.667a.666.666 0 0 0 0-.943z"/></g></g></g></svg>
                                        </span>
                                        Выход
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="menu_and_logo_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="site-header-main-navbar">
                        <a href="/" class="logo">
                            <img src="<?= Url::base() ?>/img/large-logo.png" alt="large-logo.png" width="100" height="37">
                        </a>
                        <button class="burger" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="navigation--vd">
                            <a href="/" class="logo">
                                <img src="<?= Url::base() ?>/img/large-logo.png" alt="large-logo.png" width="100" height="37">
                            </a>
                            <ul class="site-header-main-navbar-list">
                                <li>
                                    <a href="/">Главная</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to('/about') ?>">О компании</a>
                                </li>
                                <li class="has-drop investition-drop">
                                    <a>Инвестиции</a>
                                    <div class="drop-container">
                                        <div class="drop-container-left">
                                            <ul>
                                                <li>
                                                    <a href="<?= Url::to(['/investment/accounts']) ?>">ПАММ Счета</a>
                                                </li>
                                                <li>
                                                    <a href="<?= Url::to(['/investment/bag']) ?>">ПАММ портфель</a>
                                                </li>
                                                <li>
                                                    <a href="<?= Url::to(['/investment/intellectual-investment']) ?>">Интеллектуальные
                                                        инвестиции</a>
                                                </li>
                                                <li>
                                                    <a href="<?= Url::to(['/investment/express-investment']) ?>">CFD /
                                                        Срочная инвестиция</a>
                                                </li>
                                                <li>
                                                    <a href="<?= Url::to(['/investment/ipo']) ?>">IPO / ICO</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="drop-container-right">
                                            <ul class="information-about-us-grid-large-list">
                                                <li class="information-about-us-grid-large-list-item">
                                                    <a href="<?= Url::to(['/asset/index']) ?>">
                                                        <img src="<?= Url::base() ?>/img/inform-about-2.png"
                                                             alt="inform-about-2.png">
                                                        <div class="information-about-us-grid-large-list-item-name">
                                                            <h4>
                                                                Активы
                                                            </h4>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="information-about-us-grid-large-list-item">
                                                    <a href="<?= Url::to(['/strategy']) ?>">
                                                        <img src="<?= Url::base() ?>/img/inform-about-3.png"
                                                             alt="inform-about-3.png">
                                                        <div class="information-about-us-grid-large-list-item-name">
                                                            <h4>
                                                                Стратегии
                                                            </h4>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/depository']) ?>">Депозитарий</a>
                                </li>
                                <li class="has-drop client-drop">
                                    <a>Клиенту</a>
                                    <div class="drop-container">
                                        <div class="drop-container-left">
                                            <ul>
                                                <li>
                                                    <a href="<?= Url::to(['/cooperation']) ?>">Сотрудничество</a>
                                                </li>
                                                <li>
                                                    <a href="<?= Url::to(['/cash-flow']) ?>">Получения дивидендов</a>
                                                </li>
                                                <li>
                                                    <a href="<?= Url::to(['/regulation']) ?>">Нормативные документы</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="drop-container-right drop-container-contacts-right">
                                            <div class="contacts-with-us-in-menu-row">
                                                <div class="contacts-with-us-in-menu-left">
                                                    <p class="catergoria-name">
                                                        Остались вопросы?
                                                    </p>
                                                    <p class="site-header-top-item">
                                                                    <span class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                             height="19" viewBox="0 0 19 19"><g><g><g><path
                                                                                                fill="#d99a05"
                                                                                                d="M18.8 14.77a.669.669 0 0 1-.009.949c-.568.566-1.134 1.131-1.702 1.7l-4.386-4.389c.1-.07.193-.145.278-.23l.692-.696.751-.75h.003a.68.68 0 0 1 .954-.004l3.418 3.42zm-9.227-1.33c.588.505 1.437.603 2.15.339l4.505 4.504c-1.076 1.05-3.749.923-6.1-.224-1.008-.492-1.927-1.127-2.798-1.79a23.933 23.933 0 0 1-2.444-2.154 25.126 25.126 0 0 1-2.146-2.45c-.661-.87-1.3-1.787-1.794-2.803C-.202 6.515-.336 3.844.712 2.766l4.503 4.505c-.264.713-.165 1.561.341 2.146.62.722 1.274 1.409 1.941 2.08a38.482 38.482 0 0 0 2.076 1.943zM5.964 6.29zM1.577 1.9L3.276.2a.674.674 0 0 1 .949-.008l3.418 3.42a.676.676 0 0 1-.004.956l-.748.747-.697.697a1.92 1.92 0 0 0-.23.278z"></path></g></g></g></svg>
                                                                    </span>
                                                        <a href="tel:<?= str_replace([' ', '-', '_', '(', ')'], '', Html::encode(ContactHelper::getPhone()->text)); ?>"><?= Html::encode(ContactHelper::getPhone()->text) ?></a>
                                                    </p>
                                                    <p class="site-header-top-item">
                                                                    <span class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23"
                                                                             height="15" viewBox="0 0 23 15"><g><g><path
                                                                                            fill="#d99a05"
                                                                                            d="M12.367 9.537c-.304.25-.703.388-1.12.388-.42 0-.818-.137-1.122-.386l-1.75-1.443L0 14.86v.021c0 .065.055.12.12.12h22.191a.12.12 0 0 0 .119-.12v-.02l-8.368-6.723zm2.427-2.002l7.636 6.135V1.234zM0 1.193v12.474l7.643-6.174zm11.243 7.803h.005c.169 0 .336-.049.471-.138l.037-.024.025-.016.427-.353L22.406.049A.12.12 0 0 0 22.311 0H.119a.115.115 0 0 0-.074.027l10.67 8.794a.836.836 0 0 0 .528.175z"></path></g></g></svg>
                                                                    </span>
                                                        <a href="mailto:<?= Html::encode(ContactHelper::getEmail()->email) ?>"><?= Html::encode(ContactHelper::getEmail()->email) ?></a>
                                                    </p>
                                                    <p class="site-header-top-item">
                                                                    <span class="icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                             height="19" viewBox="0 0 19 19"><g><g><g><path
                                                                                                fill="#d99a05"
                                                                                                d="M13.337 13.619a.317.317 0 0 0-.074.629c3.33.392 5.104 1.448 5.104 2.06 0 .86-3.373 2.059-8.867 2.059-5.494 0-8.867-1.2-8.867-2.059 0-.612 1.774-1.668 5.104-2.06a.317.317 0 0 0-.074-.63C2.329 14.013 0 15.119 0 16.309 0 17.646 3.263 19 9.5 19s9.5-1.354 9.5-2.692c0-1.19-2.329-2.296-5.663-2.69z"></path></g><g><path
                                                                                                fill="#d99a05"
                                                                                                d="M9.5 3.8a2.22 2.22 0 0 1 2.217 2.217A2.22 2.22 0 0 1 9.5 8.233a2.22 2.22 0 0 1-2.217-2.216A2.22 2.22 0 0 1 9.5 3.8zm-.056 13.54l4.858-7.017c1.822-2.429 1.559-6.422-.564-8.544A6.032 6.032 0 0 0 9.444 0 6.033 6.033 0 0 0 5.15 1.779C3.027 3.9 2.764 7.894 4.579 10.314z"></path></g></g></g></svg>
                                                                    </span>
                                                        <?= Html::encode(ContactHelper::getAddress()->text) ?>
                                                    </p>
                                                </div>
                                                <div class="contacts-with-us-in-menu-right">
                                                    <img src="<?= Url::base() ?>/img/menu-1.png" alt="menu-1.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/contact']) ?>">Контакты</a>
                                </li>
                            </ul>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <ul class="mkvs-list-enter">
                            <li class="item-sign-up">
                        <p class="mkvs-enter">
                            <a href="<?= Url::to(['/login']) ?>" class="button-border-style user-enter">
                            <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><g><g><g><path fill="#fff" d="M10.339 8.666a.678.678 0 0 0-.69.667V12a.679.679 0 0 1-.689.666H6.893v-10c0-.569-.375-1.077-.94-1.267l-.203-.066h3.21c.38 0 .69.3.69.667v2c0 .368.308.667.689.667.381 0 .69-.3.69-.667V2c0-1.103-.929-2-2.069-2H1.55c-.025 0-.047.011-.073.015C1.444.012 1.412 0 1.38 0 .619 0 0 .598 0 1.333v12c0 .57.375 1.078.939 1.267l4.148 1.338c.14.042.28.062.427.062.76 0 1.379-.598 1.379-1.334V14H8.96c1.14 0 2.068-.898 2.068-2V9.333a.678.678 0 0 0-.69-.667z"/></g><g><path fill="#fff" d="M15.78 6.257L12.772 3.25a.752.752 0 0 0-1.283.531v2.255H8.482a.752.752 0 0 0 0 1.504h3.007v2.255a.753.753 0 0 0 1.283.532L15.78 7.32a.75.75 0 0 0 0-1.063z"/></g></g></g></svg>
                            </span>
                                Кабинет
                            </a>
                        </p>
                            </li>
                            <li>
                        <p class="mkvs-registration">
                            <a href="<?= Url::to(['/signup']) ?>" class="user-registration button">
                                Регистрация
                            </a>
                        </p>
                            </li>
                        </ul>
                    <?php else: ?>
                        <div class="mkvs-user-account-info">
                            <p class="mkvs-user-authorization">
                                <a href="<?= Url::to(['cabinet/default/index']) ?>" class="mkvs-toggle-drop">
                                    <span class="user-icon icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"><g><g><g><g><path fill="#fff" d="M8.737 9.713c1.266 0 2.346-.448 3.242-1.344.895-.895 1.343-1.976 1.343-3.242s-.448-2.346-1.343-3.242C11.083.99 10.003.542 8.737.542S6.39.99 5.495 1.885c-.896.896-1.344 1.976-1.344 3.242S4.6 7.474 5.495 8.37c.896.896 1.976 1.344 3.242 1.344z"/></g><g><path fill="#fff" d="M17.101 14.554a12.227 12.227 0 0 0-.167-1.301c-.084-.466-.19-.898-.317-1.296a6.144 6.144 0 0 0-.513-1.164 4.193 4.193 0 0 0-.74-.967 3.117 3.117 0 0 0-1.021-.639 3.59 3.59 0 0 0-1.332-.239c-.071 0-.239.086-.501.257-.263.171-.56.362-.89.573-.33.21-.76.402-1.29.573-.529.171-1.06.257-1.594.257a5.153 5.153 0 0 1-1.594-.257c-.529-.17-.959-.362-1.29-.573-.33-.21-.626-.402-.889-.573-.262-.171-.43-.257-.501-.257-.486 0-.93.08-1.332.239-.402.16-.742.372-1.02.639-.28.267-.526.589-.74.967a6.153 6.153 0 0 0-.514 1.164c-.127.398-.233.83-.317 1.296-.083.466-.139.9-.167 1.301-.028.403-.042.814-.042 1.236 0 .956.291 1.71.872 2.263.581.553 1.354.83 2.317.83h10.436c.963 0 1.735-.277 2.317-.83.58-.553.871-1.307.871-2.263 0-.422-.014-.833-.042-1.236z"/></g></g></g></g></svg>
                                    </span>
                                    <?= Yii::$app->user->identity->getFullName() ?>
                                    <span class="drop-down-icon icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"><g><g><path fill="#fff" d="M9.5 1.874V0L4.844 3.748.13 0v1.874l4.713 3.748z"/></g></g></svg>
                                    </span>
                                </a>
                            </p>
                            <div class="mkvs-user-info-dropdown">
                                <div class="mkvs-user-emai">
                                    <a href=<?= Url::to(['/cabinet']) ?>>
                                        Личный кабинет
                                    </a>
                                </div>
                                <p class="mkvs-status">
                                    Статус: <span><?= UserHelper::getVerificationNameForFront(Yii::$app->user->identity->verified) ?></span>
                                </p>
                                <div class="mkvs-user-balance">
                                    <p class="mkvs-user-balance-label">
                                        Баланс: <?= UserHelper::showBalance(Yii::$app->user->identity->balance) ?>
                                    </p>
                                    <p class="mkvs-user-balance-label">
                                        Счет: <?= Yii::$app->user->identity->account ?>
                                    </p>
                                </div>
                                <p class="mkvs-logout">
                                    <a href="<?= Url::to(['/logout']) ?>" class="button-border-style">
                                        <span class="logout-icon icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16"><g><g><g><path d="M10.21 8.667a.666.666 0 0 0-.667.666V12a.667.667 0 0 1-.667.667h-2v-10c0-.57-.363-1.078-.908-1.268l-.197-.066h3.105c.368 0 .667.3.667.667v2a.666.666 0 1 0 1.333 0V2c0-1.103-.897-2-2-2H1.709c-.025 0-.046.011-.07.015C1.605.012 1.574 0 1.542 0 .807 0 .209.598.209 1.333v12c0 .57.363 1.078.908 1.268l4.012 1.337c.136.042.272.062.414.062.735 0 1.333-.598 1.333-1.333V14h2c1.103 0 2-.897 2-2V9.333a.666.666 0 0 0-.667-.666z"/></g><g><path d="M16.014 6.195L13.347 3.53A.667.667 0 0 0 12.21 4v2H9.543a.667.667 0 0 0 0 1.333h2.666v2a.668.668 0 0 0 1.138.472l2.667-2.667a.666.666 0 0 0 0-.943z"/></g></g></g></svg>
                                        </span>
                                        Выход
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</header>
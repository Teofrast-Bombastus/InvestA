<?php

use shop\helpers\ContactHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $file */
/** @var $this yii\web\View */

?>


<footer class="site-footer">
    <div class="container site-footer-top">
        <div class="row">
            <div class="col-lg-4 col-6 col-sm-6 col-12 site-footer-top-item site-footer-text-col">
                <div class="site-footer-text-headline">
                    Invest aktiv
                </div>
                <p>
                    Представленная информация не является индивидуальной инвестиционной рекомендацией, и указанные финансовые инструменты либо операции могут не соответствовать Вашему инвестиционному профилю, финансовому положению, опыту инвестиций, инвестиционным целям. Перед принятием инвестиционного решения, или вступлением в сделку, инвестору необходимо тщательно взвесить свое финансовое положение и проконсультироваться со своим финансовым советником(-ами), чтобы получить полное представление о возможных рисках, а также удостовериться в том, что выбранные продукты и/или ценные бумаги и/или финансовые инструменты отвечают его потребностям и ситуации.
                </p>
                <!--
                <a href="<?= Url::to(['/about']) ?>">
                    Читать больше...
                </a>-->
            </div>
            <div class="col-lg-2 col-6 col-sm-6 col-12 site-footer-top-item site-footer-top-item-menu">
                <h4>О нас</h4>
                <ul class="site-footer-top-item-list">
                    <li>
                        <a href="<?= Url::to(['/about']) ?>">О компании</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/investment/accounts']) ?>">Инвестиции</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/strategy']) ?>">Стратегии</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/asset/index']) ?>">Активы</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 site-footer-top-item site-footer-top-item-menu">
                <h4>Клиенту</h4>
                <ul class="site-footer-top-item-list">
                    <li>
                        <a href="<?= Url::to(['/depository']) ?>">Депозитарий</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/cooperation']) ?>">Сотрудничество</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/cash-flow']) ?>">Получения дивидендов</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/regulation']) ?>">Нормативные документы</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/contact']) ?>">Контакты</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 site-footer-top-item">
                <h4>Остались вопросы?</h4>
                <p class="site-header-top-item">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"><g><g><g><path fill="#d99a05" d="M18.8 14.77a.669.669 0 0 1-.009.949c-.568.566-1.134 1.131-1.702 1.7l-4.386-4.389c.1-.07.193-.145.278-.23l.692-.696.751-.75h.003a.68.68 0 0 1 .954-.004l3.418 3.42zm-9.227-1.33c.588.505 1.437.603 2.15.339l4.505 4.504c-1.076 1.05-3.749.923-6.1-.224-1.008-.492-1.927-1.127-2.798-1.79a23.933 23.933 0 0 1-2.444-2.154 25.126 25.126 0 0 1-2.146-2.45c-.661-.87-1.3-1.787-1.794-2.803C-.202 6.515-.336 3.844.712 2.766l4.503 4.505c-.264.713-.165 1.561.341 2.146.62.722 1.274 1.409 1.941 2.08a38.482 38.482 0 0 0 2.076 1.943zM5.964 6.29zM1.577 1.9L3.276.2a.674.674 0 0 1 .949-.008l3.418 3.42a.676.676 0 0 1-.004.956l-.748.747-.697.697a1.92 1.92 0 0 0-.23.278z"></path></g></g></g></svg>
                        </span>
                    <a href="tel:<?= str_replace([' ', '-', '_', '(', ')'], '', Html::encode(ContactHelper::getPhone()->text)); ?>"><?= Html::encode(ContactHelper::getPhone()->text) ?></a>
                </p>
                <p class="site-header-top-item">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15"><g><g><path fill="#d99a05" d="M12.367 9.537c-.304.25-.703.388-1.12.388-.42 0-.818-.137-1.122-.386l-1.75-1.443L0 14.86v.021c0 .065.055.12.12.12h22.191a.12.12 0 0 0 .119-.12v-.02l-8.368-6.723zm2.427-2.002l7.636 6.135V1.234zM0 1.193v12.474l7.643-6.174zm11.243 7.803h.005c.169 0 .336-.049.471-.138l.037-.024.025-.016.427-.353L22.406.049A.12.12 0 0 0 22.311 0H.119a.115.115 0 0 0-.074.027l10.67 8.794a.836.836 0 0 0 .528.175z"/></g></g></svg>
                        </span>
                    <a href="mailto:<?= Html::encode(ContactHelper::getEmail()->email) ?>"><?= Html::encode(ContactHelper::getEmail()->email) ?></a>
                </p>
                <p class="site-header-top-item">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"><g><g><g><path fill="#d99a05" d="M13.337 13.619a.317.317 0 0 0-.074.629c3.33.392 5.104 1.448 5.104 2.06 0 .86-3.373 2.059-8.867 2.059-5.494 0-8.867-1.2-8.867-2.059 0-.612 1.774-1.668 5.104-2.06a.317.317 0 0 0-.074-.63C2.329 14.013 0 15.119 0 16.309 0 17.646 3.263 19 9.5 19s9.5-1.354 9.5-2.692c0-1.19-2.329-2.296-5.663-2.69z"></path></g><g><path fill="#d99a05" d="M9.5 3.8a2.22 2.22 0 0 1 2.217 2.217A2.22 2.22 0 0 1 9.5 8.233a2.22 2.22 0 0 1-2.217-2.216A2.22 2.22 0 0 1 9.5 3.8zm-.056 13.54l4.858-7.017c1.822-2.429 1.559-6.422-.564-8.544A6.032 6.032 0 0 0 9.444 0 6.033 6.033 0 0 0 5.15 1.779C3.027 3.9 2.764 7.894 4.579 10.314z"></path></g></g></g></svg>
                        </span>
                    <?= Html::encode(ContactHelper::getAddress()->text) ?>
                </p>
            </div>
        </div>
        <div class="pay-system">
            <p class="pay-system__hedline">
                Способы оплаты
            </p>
            <ul class="pay-system__list">
                <li class="pay-system__item">
                    <img src="<?= Url::base() ?>/img/fp-1.svg" widt="72" height="25" alt="Способы оплаты scrill">
                </li>
                <li class="pay-system__item">
                    <img src="<?= Url::base() ?>/img/fp-2.svg" widt="72" height="25" alt="Способы оплаты bitcoin">
                </li>
                <li class="pay-system__item">
                    <img src="<?= Url::base() ?>/img/fp-3.svg" widt="72" height="25" alt="Способы оплаты mastercard">
                </li>
                <li class="pay-system__item">
                    <img src="<?= Url::base() ?>/img/fp-4.svg" widt="72" height="25" alt="Способы оплаты qiwi">
                </li>
                <li class="pay-system__item">
                    <img src="<?= Url::base() ?>/img/fp-5.svg" widt="72" height="25" alt="Способы оплаты visa">
                </li>
                <li class="pay-system__item">
                    <img src="<?= Url::base() ?>/img/fp-6.svg" widt="72" height="25" alt="Способы оплаты webmoney">
                </li>
                <li class="pay-system__item">
                    <img src="<?= Url::base() ?>/img/fp-7.svg" widt="72" height="25" alt="Способы оплаты yandex-money">
                </li>
                <li class="pay-system__item">
                    <img src="<?= Url::base() ?>/img/h-logo.png" widt="72" height="25" alt="Способы оплаты оплаты we">
                </li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 copyright-col">
                    <p class="copyright-text">
                        <?= date('Y') ?> © Invest aktiv company
                    </p>
<!--                    <ul class="copyright__list">-->
<!--                        <li class="copyright__item">-->
<!--                            <a href="/img/docs/doc_on.pdf" class="copyright__link" target="blank">-->
<!--                                Договор на открытие и обслуживание депозитария.pdf-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="copyright__item">-->
<!--                            <a href="/img/docs/doc_about.pdf" class="copyright__link" target="blank">-->
<!--                                Договор об открытие расчетного счета</a>-->
<!--                        </li>-->
<!--                        <li class="copyright__item">-->
<!--                            <a href="/img/docs/brock.pdf" class="copyright__link" target="blank">-->
<!--                                Соглашение о брокерском обслуживание                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</footer>
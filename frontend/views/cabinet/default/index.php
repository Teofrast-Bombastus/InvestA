<?php

/** @var  $this yii\web\View; */
/** @var  $files [] shop\entities\user\cabinet\CabinetFile */

$this->title = 'Личный кабинет';

use shop\entities\user\cabinet\DepoAccount;
use shop\helpers\FileHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<h1>Добро пожаловать, клиент</h1>
<div class="user-account-text">
    <p>
        Добро пожаловать в Ваш личный кабинет, в Вашу панель управления счетом.
    </p>
    <p>
        В личном кабинете Вы будете в курсе последней информации о компании и о рынках.
    </p>
    <p>
        Для доступа нашим партнерам предлагаются Российские и международные фондовые рынки, информационно аналитическая поддержка.
    </p>
    <p>
        Открытие депозитария по низким тарифам от 3-х месяцев.
    </p>
    <p>
        Сотрудничая с <strong>ООО ИНВЕСТАКТИВ</strong> вы получаете выплаты по дивидендам каждый квартал / месяц.
    </p>
    <p>
        Выгодная конвертация валюты, а также дополнительная ликвидность от ООО ИНВЕСТАКТИВ в индивидуальном порядке для увеличения инвестиционного капитала.
    </p>
</div>
<div class="user-account-banner-wrapper">
    <div class="user-account-banner">
        <h2 class="user-account-h2">Купите ценные бумаги сейчас</h2>
        <p class="user-account-menegment-text">Управляйте инвестициями онлайн</p>
        <p>
            <a href="<?= Url::to(['cabinet/cash/input']) ?>" class="button">
                Подробнее
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path
                                            fill="#fff"
                                            d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path
                                            fill="#fff"
                                            d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path
                                            fill="#fff"
                                            d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
                </span>
            </a>
        </p>
    </div>
</div>
<div class="user-account-products">
    <div class="row user-account-products-row">
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12  user-account-products-item">
            <div class="user-account-img-wrap">
                <img src="<?= Url::base() ?>/img/market.svg" width="70" height="70" alt="Фондовый рынок">
            </div>
            <p class="user-account-products-name">Фондовый рынок</p>
            <a href="<?= Url::to(['open-account', 'type' => DepoAccount::TYPE_STOCK_MARKET]) ?>" class="button">Открыть
                Счет Депо</a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4  col-sm-6 col-12 user-account-products-item">
            <div class="user-account-img-wrap">
                <img src="<?= Url::base() ?>/img/car.svg" width="70" height="70" alt="Товарно-сырьевой рынок">
            </div>
            <p class="user-account-products-name">Товарно-сырьевой рынок</p>
            <a href="<?= Url::to(['open-account', 'type' => DepoAccount::TYPE_COMMODITY_MARKET]) ?>" class="button">Открыть
                Счет Депо</a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4  col-sm-6 col-12 user-account-products-item">
            <div class="user-account-img-wrap">
                <img src="<?= Url::base() ?>/img/money.svg" width="70" height="70" alt="Валюта">
            </div>
            <p class="user-account-products-name">Валюта</p>
            <a href="<?= Url::to(['open-account', 'type' => DepoAccount::TYPE_CURRENCY]) ?>" class="button">Открыть Счет
                Депо</a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4  col-sm-6 col-12 user-account-products-item">
            <div class="user-account-img-wrap">
                <img src="<?= Url::base() ?>/img/bitcoine.svg" width="70" height="70" alt="Криптовалюта">
            </div>
            <p class="user-account-products-name">Криптовалюта</p>
            <a href="<?= Url::to(['open-account', 'type' => DepoAccount::TYPE_CRYPTO_CURRENCY]) ?>" class="button">Открыть
                Счет Депо</a>
        </div>
    </div>
</div>

<?php if (!empty($files)): ?>
    <div class="document">
        <div class="row">
            <div class="col-12">
                <div class="h2-wrapper">
                    <h2>Нормативные документы</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <?php foreach ($files as $file): ?>

                <div class="col-lg-3 col-md-4 col-sm-6 document-item">
                    <a href="<?= $file->file ? $file->getUploadedFileUrl('file') : '' ?>" class="document-item-link"
                       target="_blank" title="<?= $file->file ?: '' ?>">
                        <div class="document-item-link-img">
                            <img src="<?= Url::base() ?>/img/<?= $file->file ? FileHelper::getIcon($file->file) : '' ?>"
                                 alt="<?= $file->file ?: '' ?>">
                        </div>
                        <div class="document-item-link-content">
                            <p class="doc-name-computer">
                                <?= StringHelper::truncate($file->file ?: '', 10) ?>
                                <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"><g><g><path
                                                    fill="#d99a05"
                                                    d="M18.53 13.356c0-.29.23-.52.52-.52.29 0 .528.23.528.52v5.116a.53.53 0 0 1-.528.528H.556a.524.524 0 0 1-.52-.528v-5.116c0-.29.23-.52.52-.52.29 0 .528.23.528.52v4.595H18.53zm-8.35 1.249a.534.534 0 0 1-.744 0L4.773 9.942a.52.52 0 0 1 0-.743.52.52 0 0 1 .744 0l3.762 3.763V.528a.524.524 0 1 1 1.049 0v12.434l3.77-3.763a.512.512 0 0 1 .736 0 .52.52 0 0 1 0 .743z"></path></g></g></svg>
                            </span>
                            </p>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
<?php endif; ?>

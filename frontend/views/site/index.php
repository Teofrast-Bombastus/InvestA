<?php


use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $regulations shop\entities\shop\Regulation[] */
/* @var $licencePhotos shop\entities\shop\LicencePhoto[] */
/* @var $askQuestionForm shop\forms\shop\AskQuestionForm */


$this->params['home-page'] = 'home-page';

$this->title = 'Депозитарные услуги для физических лиц |Юридических лиц |Акции |Сырье |Металлы';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Работаем в сфере инвестиций свыше 10 лет. Проведем Вас через финансовые дебри. Сотрудничаем с 50 000 клиентами с 13 стран. Стабильные диведенты от 13% годовых',
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'ложение инвестиций, куда инвестировать деньги, деньги вложение, управление инвестициями, форекс онлайн, форекс официальный, управление финансовыми инвестициями, компания управление инвестициями, управление капиталом в инвестициях, системы управления инвестициями',
]);

?>

<section class="promo">
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
      
      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
          {
              "symbols": [
              {
                  "proName": "OANDA:SPX500USD",
                  "title": "S&P 500"
              },
              {
                  "proName": "OANDA:NAS100USD",
                  "title": "NASDAQ 100"
              },
              {
                  "proName": "FX_IDC:EURUSD",
                  "title": "EUR/USD"
              },
              {
                  "proName": "BITSTAMP:BTCUSD",
                  "title": "BTC/USD"
              },
              {
                  "proName": "BITSTAMP:ETHUSD",
                  "title": "ETH/USD"
              }
              ],
              "colorTheme": "light",
              "isTransparent": false,
              "displayMode": "adaptive",
              "locale": "ru"
          }
      </script>
  </div>
  <!-- TradingView Widget END -->

  <div class="promo-slider">
    <div class="promo-slider-item">
        <div class="promo-slider-item-image"
        style="background-image: url('<?= Url::base() ?>/img/slider/promo-1.png')">
    </div>
    <div class="promo-slider-item-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="promo-slider-item-wrapper-content">
                        <div class="promo-slider-headline">
                            Управляйте своими инвестициями просто и эффективно
                        </div>
                        <p class="promo-slider-description">
                            с помощью портфельных инвестиций
                        </p>
                        <div class="promo-slider-link-wrapper">
                            <a href="<?= Url::to(['/investment/accounts']) ?>" class="button">
                                Подробнее
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15"
                                    viewBox="0 0 27 15"><g><g><g><path fill="#fff"
                                        d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"/></g><g><path
                                            fill="#fff"
                                            d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"/></g><g><path
                                                fill="#fff"
                                                d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"/></g></g></g></svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="promo-slider-item">
                <div class="promo-slider-item-image"
                style="background-image: url('<?= Url::base() ?>/img/slider/NYSE.jpg')">
            </div>
            <div class="promo-slider-item-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="promo-slider-item-wrapper-content">
                                <div class="promo-slider-headline">
                                    Депозитарные услуги для физических и юридических лиц
                                </div>
                                <p class="promo-slider-description">
                                    Ваши деньги нуждаются в скорости
                                </p>
                                <div class="promo-slider-link-wrapper">
                                    <a href="<?= Url::to(['/depository']) ?>" class="button">
                                        Подробнее
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15"
                                            viewBox="0 0 27 15"><g><g><g><path fill="#fff"
                                                d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"/></g><g><path
                                                    fill="#fff"
                                                    d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"/></g><g><path
                                                        fill="#fff"
                                                        d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"/></g></g></g></svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="promo-slider-item">
                        <div class="promo-slider-item-image"
                        style="background-image: url('<?= Url::base() ?>/img/slider/image_new.jpg')">
                    </div>
                    <div class="promo-slider-item-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="promo-slider-item-wrapper-content">
                                        <div class="promo-slider-headline">
                                            Начните получать дивиденды уже сегодня
                                        </div>
                                        <p class="promo-slider-description">
                                            Привилегированные акции Visa, Nike, Toyota
                                        </p>
                                        <div class="promo-slider-link-wrapper">
                                            <a href="<?= Url::to(['/investment/express-investment']) ?>" class="button">
                                                Подробнее
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15"
                                                    viewBox="0 0 27 15"><g><g><g><path fill="#fff"
                                                        d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"/></g><g><path
                                                            fill="#fff"
                                                            d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"/></g><g><path
                                                                fill="#fff"
                                                                d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"/></g></g></g></svg>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="promo-slider-item">
                                <div class="promo-slider-item-image" style="background-image: url('<?= Url::base() ?>/img/slider/3.jpg')">
                                </div>
                                <div class="promo-slider-item-wrapper">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="promo-slider-item-wrapper-content">
                                                    <div class="promo-slider-headline">
                                                        Работаем в сфере инвестиций свыше 10 лет с 50 000 клиентами с 13 стран
                                                    </div>
                                                    <p class="promo-slider-description">
                                                        Проведем Вас через финансовые дебри
                                                    </p>
                                                    <div class="promo-slider-link-wrapper">
                                                        <a href="<?= Url::to(['/about']) ?>" class="button">
                                                            Подробнее
                                                            <span class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15"
                                                                viewBox="0 0 27 15"><g><g><g><path fill="#fff"
                                                                    d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"/></g><g><path
                                                                        fill="#fff"
                                                                        d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"/></g><g><path
                                                                            fill="#fff"
                                                                            d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"/></g></g></g></svg>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promo-slider-navigation">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 promo-slider-navigation-col">
                                                    <button type="button" class="promo-prev slider-promo-button">
                                                        <span class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="30" viewBox="0 0 16 30"><g><g><path
                                                                fill="#fff"
                                                                d="M2.202 15L15.75 1.45a.846.846 0 0 0 0-1.2.846.846 0 0 0-1.2 0L.396 14.402a.846.846 0 0 0 0 1.2L14.55 29.75a.854.854 0 0 0 .598.251.828.828 0 0 0 .597-.251.846.846 0 0 0 0-1.201z"/></g></g></svg>
                                                            </span>
                                                        </button>
                                                        <button type="button" class="promo-next slider-promo-button">
                                                            <span class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="30" viewBox="0 0 16 30"><g><g><path
                                                                    fill="#fff"
                                                                    d="M13.798 15L.25 1.45a.846.846 0 0 1 0-1.2.846.846 0 0 1 1.2 0l14.153 14.152a.846.846 0 0 1 0 1.2L1.45 29.75A.854.854 0 0 1 .853 30a.828.828 0 0 1-.597-.251.846.846 0 0 1 0-1.201z"/></g></g></svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="investment-options">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="h2-wrapper">
                                                            <h2>Варианты инвестиций</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="investment-options-slider">
                                                            <div class="investment-options-slider-item">
                                                                <a href="<?= Url::to(['/investment/accounts']) ?>" class="investment-options-slider-item-wrap">
                                                                    <div class="box-top">
                                                                        <div class="investment-options-slider-item-wrap-image">
                                                                            <img src="<?= Url::base() ?>/img/o-1.png" alt="o-1.png">
                                                                        </div>
                                                                        <h3>
                                                                            ПАММ СЧЕТА
                                                                        </h3>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <p class="investment-options-slider-description">
                                                                        Количество инвесторов 1350.  
                                                                        Прибыль от 3% / мес
                                                                    </p>
                                                                </a>
                                                            </div>
                                                            <div class="investment-options-slider-item">
                                                                <a href="<?= Url::to(['/investment/bag']) ?>" class="investment-options-slider-item-wrap">
                                                                    <div class="box-top">
                                                                        <div class="investment-options-slider-item-wrap-image">
                                                                            <img src="<?= Url::base() ?>/img/o-2.png" alt="o-2.png">
                                                                        </div>
                                                                        <h3>
                                                                            ПАММ портфель
                                                                        </h3>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <p class="investment-options-slider-description">
                                                                        Количество инвесторов: 2120.  
                                                                        Прибыль: от 2% / мес
                                                                    </p>
                                                                </a>
                                                            </div>
                                                            <div class="investment-options-slider-item">
                                                                <a href="<?= Url::to(['/investment/intellectual-investment']) ?>"
                                                                 class="investment-options-slider-item-wrap">
                                                                 <div class="box-top">
                                                                    <div class="investment-options-slider-item-wrap-image">
                                                                        <img src="<?= Url::base() ?>/img/o-3.png" alt="o-3.png">
                                                                    </div>
                                                                    <h3>
                                                                        Интеллектуальные инвестиции
                                                                    </h3>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <p class="investment-options-slider-description">
                                                                    Количество инвесторов: 575. 
                                                                    Прибыль: от 5% /мес
                                                                </p>
                                                            </a>
                                                        </div>
                                                        <div class="investment-options-slider-item">
                                                            <a href="<?= Url::to(['/investment/express-investment']) ?>"
                                                             class="investment-options-slider-item-wrap">
                                                             <div class="box-top">
                                                                <div class="investment-options-slider-item-wrap-image">
                                                                    <img src="<?= Url::base() ?>/img/o-4.png" alt="o-4.png">
                                                                </div>
                                                                <h3>
                                                                    CFD / Срочная инвестиция
                                                                </h3>
                                                            </div>
                                                            <div class="divider"></div>
                                                            <p class="investment-options-slider-description">
                                                                Количество инвесторов: 3443. 
                                                                Прибыль: от  3-10% / мес
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <div class="investment-options-slider-item">
                                                        <a href="<?= Url::to(['/investment/ipo']) ?>" class="investment-options-slider-item-wrap">
                                                            <div class="box-top">
                                                                <div class="investment-options-slider-item-wrap-image">
                                                                    <img src="<?= Url::base() ?>/img/ipo.svg" alt="ipo.svg">
                                                                </div>
                                                                <h3>
                                                                    IPO / ICO
                                                                </h3>
                                                            </div>
                                                            <div class="divider"></div>
                                                            <p class="investment-options-slider-description">
                                                                Количество инвесторов: 775. 
                                                                Прибыль: от 20% / мес
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="investment-navigation">
                                                    <button type="button" class="investment-prev">
                                                        <span class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11"><g><g><g><path
                                                                d="M.736 5.373L5.589.52c.12-.12.12-.311 0-.43a.303.303 0 0 0-.43 0L.089 5.159c-.119.12-.119.31 0 .43l5.07 5.067c.059.059.137.09.214.09.077 0 .155-.029.214-.09.12-.119.12-.31 0-.43z"/></g></g></g></svg>
                                                            </span>
                                                            Назад
                                                        </button>
                                                        <button type="button" class="investment-next">
                                                            Вперед
                                                            <span class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="11" viewBox="0 0 7 11"><g><g><g><path
                                                                    d="M5.82 5.466L.882.53a.308.308 0 0 1 0-.438.308.308 0 0 1 .438 0L6.478 5.25a.308.308 0 0 1 0 .437L1.32 10.842a.302.302 0 0 1-.435 0 .308.308 0 0 1 0-.438z"/></g></g></g></svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="statistics" style="background-image: url('<?= Url::base() ?>/img/statistic-background.png')">
                                            <div class="container">
                                                <div class="row statistics_row" id="count-double">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 statistics-item">
                                                        <div class="statistics-item-wrapper">
                                                            <div class="statistics-item-wrapper-values ">
                                                                ><span class="count-animation">50000</span>
                                                            </div>
                                                            <p class="statistics-item-wrapper-description">
                                                                клиентов
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 statistics-item">
                                                        <div class="statistics-item-wrapper">
                                                            <div class="statistics-item-wrapper-values">
                                                                <span class="count-animation">11</span>+
                                                            </div>
                                                            <p class="statistics-item-wrapper-description">
                                                                лет на рынке
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 statistics-item">
                                                        <div class="statistics-item-wrapper">
                                                            <div class="statistics-item-wrapper-values">
                                                                <span class="count-animation">5</span>
                                                            </div>
                                                            <p class="statistics-item-wrapper-description">
                                                                видов инвестиций
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 statistics-item">
                                                        <div class="statistics-item-wrapper">
                                                            <div class="statistics-item-wrapper-values">
                                                                <span class="count-animation">825</span>
                                                            </div>
                                                            <p class="statistics-item-wrapper-description">
                                                                специалистов в штате
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="information-about-us ">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="h2-wrapper">
                                                            <h2>Информация о нас </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container information-about-us-grid-container">
                                                <div class="row">
                                                    <div class="information-about-us-grid-large">
                                                        <ul class="information-about-us-grid-large-list">
                                                            <li class="information-about-us-grid-large-list-item">
                                                                <a href="<?= Url::to(['/depository']) ?>">
                                                                    <img src="<?= Url::base() ?>/img/inform-about-1.png" alt="inform-about-1.png">
                                                                    <div class="information-about-us-grid-large-list-item-name">
                                                                        <h4>
                                                                            Депозитарий
                                                                        </h4>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="information-about-us-grid-small">
                                                        <ul class="information-about-us-grid-large-list">
                                                            <li class="information-about-us-grid-large-list-item">
                                                                <a href="<?= Url::to(['/asset/index']) ?>">
                                                                    <img src="<?= Url::base() ?>/img/inform-about-2.png" alt="inform-about-2.png">
                                                                    <div class="information-about-us-grid-large-list-item-name">
                                                                        <h4>
                                                                            Активы
                                                                        </h4>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="information-about-us-grid-large-list-item">
                                                                <a href="<?= Url::to(['/strategy']) ?>">
                                                                    <img src="<?= Url::base() ?>/img/inform-about-3.png" alt="inform-about-3.png">
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
                                            </div>
                                        </section>
                                        <?php //if ($_SERVER['REMOTE_ADDR'] == '194.44.192.200') : ?>
                                        <section class="information-about-us  bank-cards">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="h2-wrapper">
                                                            <h2>Информация о картах</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container information-about-us-grid-container">
                                                <div class="row bank-card-item">
                                                    <div class="col-md-4 col-sm-5 col-xs-12">
                                                        <img src="/img/card-1.jpg" alt="">
                                                    </div>
                                                    <div class="col-md-8 col-md-7 col-sm-7 col-xs-12">
                                                        <ul class="cart-bank-list">
                                                            <li>Валюта – ₽ / $</li>
                                                            <li>Срок действия – 3 года</li>
                                                            <li>Стоимость годового обслуживания 1500 ₽</li>
                                                            <li>В месяц можно снимать до 3 000 000 без комиссии в банкоматах и кассах
                                                                Сбербанка
                                                            </li>
                                                            <li>В банкоматах других банков 0.05% от суммы, но не менее 100 ₽</li>
                                                            <li>Уведомление по карте (смс и пуш уведомление об операциях)</li>
                                                        </ul>
                                                        <a href="#" class="collapse-div collapse-link" data-index="#collapse-div-1">Читать дальше ...</a>
                                                        <div class="content-one" id="collapse-div-1" style=" display:none;">
                                                            <ul class="cart-bank-list">
                                                                <li>PayPass</li>
                                                                <li>Пополнение счета в личном кабинете в ООО «ИНВЕСТАКТИВ» без комиссий.</li>
                                                                <li>Вывод средств в личном кабинете в ООО «ИНВЕСТАКТИВ» без комиссий.</li>
                                                                <li>При пополнение личного кабинета в ООО «ИНВЕСТАКТИВ» кэшбек 5%</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row  bank-card-item">
                                                    <div class="col-md-4 col-sm-5 col-xs-12">
                                                        <img src="/img/card-2.jpg" alt="">
                                                    </div>
                                                    <div class="col-md-8 col-sm-7 col-xs-12">
                                                        <ul class="cart-bank-list">
                                                            <li>Валюта – ₽ / $ / €</li>
                                                            <li>Срок действия – 3 года</li>
                                                            <li>Стоимость годового обслуживания 10 000 ₽</li>
                                                            <li>В месяц можно снимать до 10 000 000 без комиссии в банкоматах и кассах
                                                                Сбербанка
                                                            </li>
                                                            <li>В месяц можно снимать до 10 000 000 без комиссии в банкоматах и кассах
                                                            Сбербанка</li>
                                                            <li>Комиссия на снятие в банкоматах других банков 0.03% от суммы,  но не менее
                                                            1000 ₽</li>
                                                            <li>Уведомление по карте (смс и пуш уведомление об операциях)</li>
                                                        </ul>
                                                        <a href="#" class="collapse-div collapse-link" data-index="#collapse-div-2">Читать дальше ...</a>
                                                        <div class="content-one" id="collapse-div-2" style=" display:none;">
                                                            <ul class="cart-bank-list">
                                                                <li>PayPass</li>
                                                                <li>Пополнение счета в личном кабинете в ООО «ИНВЕСТАКТИВ» без комиссий.</li>
                                                                <li>Вывод средств в личном кабинете в ООО «ИНВЕСТАКТИВ» без комиссий.</li>
                                                                <li>При пополнение личного кабинета в ООО «ИНВЕСТАКТИВ» кэшбек 7%</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <?php //endif; ?>
                                        <?php if (!empty($regulations)): ?>
                                            <section class="document">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="h2-wrapper">
                                                                <h2>Нормативные документы</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="row document-main_row">
                                                        <?php foreach ($regulations as $regulation): ?>

                                                            <?= $this->render('../layouts/_file', [
                                                                'file' => $regulation,
                                                            ]) ?>

                                                        <?php endforeach; ?>
                                                    </div>
                                                    <div class="row all-document-link-row">
                                                        <div class="col-12 all-document-link">
                                                            <a href="<?= Url::to(['/regulation']) ?>" class="button-border-style">
                                                                Все документы
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        <?php endif; ?>

                                        <?php if (!empty($licencePhotos)): ?>
                                            <section class="license">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="h2-wrapper">
                                                                <h2>Лицензии</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container license-container">
                                                    <div class="row">
                                                        <?php $i = 0.3; ?>
                                                        <?php foreach ($licencePhotos as $licencePhoto): ?>
                                                            <?= $this->render('../layouts/_licence-photo', [
                                                                'licencePhoto' => $licencePhoto,
                                                                'i' => $i,
                                                            ]) ?>
                                                            <?php $i += 0.3; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </section>
                                        <?php endif; ?>

                                        <section class="work-with-us">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="h2-wrapper">
                                                            <h2>С нами работают</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6 col-6 work-with-us-item">
                                                        <img src="<?= Url::base() ?>/img/w-1.jpg" alt="w-1.jpg">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-6 work-with-us-item">
                                                        <img src="<?= Url::base() ?>/img/w-2.jpg" alt="w-2.jpg">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-6 work-with-us-item">
                                                        <img src="<?= Url::base() ?>/img/w-3.jpg" alt="w-3.jpg">
                                                    </div>
                                                    <div class="col-md-3  col-sm-6 col-6 work-with-us-item">
                                                        <img src="<?= Url::base() ?>/img/w-4.jpg" alt="w-4.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="call-back">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="call-back-wrapper">
                                                            <p class="call-back-headline">
                                                                Оставьте свои контакты и мы
                                                                проконсультируем Вас в ближайшее время
                                                            </p>
                                                            <?php $form = ActiveForm::begin(['action' => '/site/send-question']) ?>

                                                            <div class="call-back-wrapper-form">
                                                                <div class="row">
                                                                    <div class="col-12 call-back-wrapper-form-item">
                                                                        <label class="form-label">
                                                                            <?= $form->field($askQuestionForm, 'username')->textInput(['class' => 'input']) ?>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6 col-12 call-back-wrapper-form-item">
                                                                        <label class="form-label">
                                                                            <?= $form->field($askQuestionForm, 'phone')->textInput(['class' => 'input', 'data-mask' => 'callback-catalog-phone']) ?>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6 col-12 call-back-wrapper-form-item">
                                                                        <label class="form-label">
                                                                            <?= $form->field($askQuestionForm, 'email')->textInput(['class' => 'input']) ?>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-12 call-back-wrapper-form-item">
                                                                        <label class="form-label">
                                                                            <?= $form->field($askQuestionForm, 'text')->textarea(['class' => 'input']) ?>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-12 all-back-wrapper-form-item-button">
                                                                        <button type="submit" class="button">
                                                                            <span class="icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                                                viewBox="0 0 22 22"><g><g><g><g><g><path fill="#fff"
                                                                                  d="M14.867 13.707a.43.43 0 0 0-.43.43v2.965a2.15 2.15 0 0 1-2.148 2.148H7.65a.43.43 0 0 0-.429.43v.854l-1.026-1.026a.43.43 0 0 0-.394-.258H3.008a2.15 2.15 0 0 1-2.149-2.148v-6.618a2.15 2.15 0 0 1 2.149-2.148h4.34a.43.43 0 0 0 0-.86h-4.34A3.011 3.011 0 0 0 0 10.485v6.618a3.011 3.011 0 0 0 3.008 3.007H5.58l1.765 1.765a.43.43 0 0 0 .733-.303l.001-1.462h4.21a3.011 3.011 0 0 0 3.008-3.007v-2.965a.43.43 0 0 0-.43-.43z"/></g></g></g><g><g><g><path
                                                                                    fill="#fff"
                                                                                    d="M18.991 10.55a.43.43 0 0 0-.17.344v1.658l-1.052-1.05a.43.43 0 0 0-.43-.108 5.387 5.387 0 0 1-1.584.237h-1.088a5.392 5.392 0 0 1-5.386-5.386A5.392 5.392 0 0 1 14.667.86h1.088a5.392 5.392 0 0 1 5.386 5.386 5.346 5.346 0 0 1-2.15 4.305zM15.755 0h-1.088a6.252 6.252 0 0 0-6.245 6.245 6.252 6.252 0 0 0 6.245 6.246h1.088c.537 0 1.07-.069 1.585-.204l1.606 1.606a.43.43 0 0 0 .734-.304v-2.486A6.305 6.305 0 0 0 21.32 9.08c.45-.883.679-1.836.679-2.834A6.252 6.252 0 0 0 15.755 0z"/></g></g></g><g><g><g><path
                                                                                        fill="#fff"
                                                                                        d="M17.146 4.702a1.823 1.823 0 0 0-1.687-1.687 1.805 1.805 0 0 0-1.369.485 1.826 1.826 0 0 0-.578 1.33.43.43 0 0 0 .86 0 .95.95 0 0 1 .304-.702.96.96 0 1 1 .866 1.638.813.813 0 0 0-.64.797v1.033a.43.43 0 0 0 .859 0v-.998a1.81 1.81 0 0 0 1.385-1.896z"/></g></g></g><g><g><g><path
                                                                                            fill="#fff"
                                                                                            d="M15.635 8.992a.433.433 0 0 0-.608 0 .433.433 0 0 0 0 .608.432.432 0 0 0 .608 0 .433.433 0 0 0 0-.608z"/></g></g></g><g><g><g><path
                                                                                                fill="#fff"
                                                                                                d="M11.816 13.32H2.75a.43.43 0 0 0 0 .86h9.066a.43.43 0 1 0 0-.86z"/></g></g></g><g><g><g><path
                                                                                                    fill="#fff"
                                                                                                    d="M12.12 15.852a.433.433 0 0 0-.607 0 .433.433 0 0 0 0 .608.433.433 0 0 0 .607 0 .432.432 0 0 0 0-.608z"/></g></g></g><g><g><g><path
                                                                                                        fill="#fff"
                                                                                                        d="M10.126 15.727H2.75a.43.43 0 0 0 0 .859h7.376a.43.43 0 0 0 0-.86z"/></g></g></g><g><g><g><path
                                                                                                            fill="#fff"
                                                                                                            d="M9.023 10.914H2.75a.43.43 0 0 0 0 .86h6.273a.43.43 0 1 0 0-.86z"/></g></g></g></g></g></svg>
                                                                                                        </span>
                                                                                                        Задать вопрос
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php ActiveForm::end() ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
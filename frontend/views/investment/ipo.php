<?php

/** @var $this yii\web\View */
/** @var $investments shop\entities\shop\InvestmentFile [] */

$this->title = 'IPO / ICO';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Url;

?>


<?= $this->render('_investment-menu', [
    'active' => 'ipo',
]) ?>


<section class="only-text wow fadeIn" data-wow-duration="1.6s" data-wow-delay="0.4s">
    <div class="container">
        <div class="row">
            <div class="col-12 only-text-wrapper">
                <p>
                    Первичное публичное предложение, первичное публичное размещение Ценных бумаг / Токенов.
                </p>
                <ul>
                    <li>Получение дивидендов</li>
                    <li>Получение дохода за счет изменения стоимости цены акции.</li>
                    <li>Диверсификация капитала</li>
                    <li>Долгосрочное инвестирование</li>
                    <li>Приобретение акций</li>
                </ul>
                <p>Количество инвесторов: 775</p>
                <p>Прибыль: от 20% / мес<p>
                <img src="<?= Url::base() ?>/img/only-text-img.png" alt="only-text-img.png">
                <p>
                    Клиент вкладывает в различные ценные бумаги разного уровня. Наши специалисты подбирают количество компаний и направлений, которые зависят напрямую от инвестиционного бюджета клиента.
                </p>
            </div>
        </div>
    </div>
</section>

<?= $this->render('_principles'); ?>

<?= $this->render('_files', [
    'investments' => $investments,
]) ?>




<?php

/** @var $this yii\web\View */
/** @var $investments shop\entities\shop\InvestmentFile [] */

$this->title = 'CFD / Срочная инвестиция';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Url;
?>


<?= $this->render('_investment-menu', [
    'active' => 'express-investment',
]) ?>


<section class="only-text">
    <div class="container">
        <div class="row">
            <div class="col-12 only-text-wrapper wow fadeIn" data-wow-duration="1.6s" data-wow-delay="0.4s">
                <p>
                    При торговле CFD c Invest aktiv Вы можете:
                </p>
                <ul>
                    <li>
                        Зарабатывать при любом тренде на рынке: как на росте, так и на падении цен активов.
                    </li>
                    <li>
                        Выбирать из огромного набора рынков и инструментов торговли.
                    </li>
                    <li>
                        Зарабатывать на международных фондовых и сырьевых рынках с низким стартовым капиталом.
                    </li>
                    <li>
                        Страховать свои финансовые риски от изменения цен в будущем.
                    </li>
                    <li>
                        Получать дивиденды по акциям (если базовым активом по CFD контракту являются акции).
                    </li>
                </ul>
                <p>Количество инвесторов: 3443</p> 
                <p>Прибыль: от  3-10% / мес</p>
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




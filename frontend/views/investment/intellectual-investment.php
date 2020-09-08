<?php

/** @var $this yii\web\View */
/** @var $investments shop\entities\shop\InvestmentFile [] */

$this->title = 'Интеллектуальные инвестиции';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Url;
?>


<?= $this->render('_investment-menu', [
    'active' => 'intellectual-investment',
]) ?>


<section class="only-text">
    <div class="container">
        <div class="row">
            <div class="col-12 only-text-wrapper wow fadeIn" data-wow-duration="1.6s" data-wow-delay="0.4s">
                <p>
                    Клиент вкладывает в продукт интеллектуальной деятельности. В данном направление мы преследуем различные технологии, патенты, ноу-хау.
                </p>
                <p>
                    В данном направление мы используем Конкретизированные инвестиции.
                </p>
                <p>
                    Весь инвестиционный бюджет клиента направлен на деятельность, определенной компании которая имеет разработки в новых технологиях.
                </p>
                <p>
                    Точечная сделка помогает контрагенту делать результат клиенту свыше 50% в течение 30 дней.
                </p>
                <p>Количество инвесторов: 575</p> 
                <p>Прибыль: от 5% / мес</p>
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




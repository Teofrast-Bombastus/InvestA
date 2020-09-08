<?php


use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $depository shop\entities\shop\depository\Depository */
/* @var $askQuestionForm shop\forms\shop\AskQuestionForm */

$this->title = 'Депозитарий';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Депозитарий
        </h1>
    </div>
</div>
<section class="depositary-wiget">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="active-vidget wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="active-vidget-image-wrapper">
                        <div class="active-vidget-image-wrapper-img" style="background-image: url('<?= Url::base() ?>/img/active-2.jpg');">
                            <p class="active-vidget-name">
                                <?= $depository->description ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our-advantages">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h2-wrapper">
                    <h2>Наши преимущества</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-6 our-advantages-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                <img src="<?= Url::base() ?>/img/our-advantages-1.png" alt="">
                <p>
                    Все виды депозитарных <br>
                    услуг
                </p>
            </div>
            <div class="col-lg-3 col-md-4 col-6 our-advantages-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                <img src="<?= Url::base() ?>/img/our-advantages-2.png" alt="">
                <p>
                    Персональный менеджер
                </p>
            </div>
            <div class="col-lg-3 col-md-4 col-6 our-advantages-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                <img src="<?= Url::base() ?>/img/our-advantages-3.png" alt="">
                <p>
                    Гибкая и прозрачная <br>  тарафикация
                </p>
            </div>
            <div class="col-lg-3 col-md-4 col-6 our-advantages-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                <img src="<?= Url::base() ?>/img/our-advantages-4.png" alt="">
                <p>
                    Доскональное знание <br> рынка
                </p>
            </div>
            <div class="col-lg-3 col-md-4 col-6 our-advantages-item  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <img src="<?= Url::base() ?>/img/our-advantages-5.png" alt="">
                <p>
                    Оптимальные сроки <br> проведения операций
                </p>
            </div>
            <div class="col-lg-3 col-md-4 col-6 our-advantages-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <img src="<?= Url::base() ?>/img/our-advantages-6.png" alt="">
                <p>
                    Срочное рассмотрение <br>
                    любых вопросов
                </p>
            </div>
            <div class="col-lg-3 col-md-4 col-6 our-advantages-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <img src="<?= Url::base() ?>/img/our-advantages-7.png" alt="">
                <p>
                    Решение вопросов самым <br>
                    эффективным способом
                </p>
            </div>
            <div class="col-lg-3 col-md-4 col-6 our-advantages-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <img src="<?= Url::base() ?>/img/our-advantages-8.png" alt="">
                <p>
                    Соответствие услуг <br>
                    групповым требованиям и
                    международной практике
                </p>
            </div>
        </div>
    </div>
</section>
<section class="our-servise">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h2-wrapper">
                    <h2>Наши услуги</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12 our-servise-item">
                <p class="our-serviseheadline">
                    Основые услуги
                </p>
                <ul class="our-servise-item-list">
                    <li>
                        Открытие счета
                    </li>
                    <li>
                        Учет ценных бумаг
                    </li>
                    <li>
                        Выплата дохода
                    </li>
                    <li>
                        Обслуживание активов фондов
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-12 our-servise-item">
                <p class="our-serviseheadline">
                    Услуги с добавленной стоимостью
                </p>
                <ul class="our-servise-item-list">
                    <li>
                        Корпоративные действия и услуги
                        представительства
                    </li>
                    <li>
                        Учет ценных бумаг
                    </li>
                    <li>
                        Консультирование по инвестиционным счетам
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-12 our-servise-item">
                <p class="our-serviseheadline">
                    Первоклассные решения
                </p>
                <ul class="our-servise-item-list">
                    <li>
                        Услуги с учетом индивидуальных
                        потребностей клиентов
                    </li>
                    <li>
                        Учет ценных бумаг
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php if ($depository->photos): ?>
    <section class="license">
        <div class="container license-container">
            <div class="row">
                <?php $i = 0.3; ?>
                <?php foreach ($depository->photos as $photo): ?>
                    <?= $this->render('../layouts/_licence-photo', [
                        'licencePhoto' => $photo,
                        'i' => $i,
                    ]) ?>
                    <?php $i += 0.3; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($depository->files): ?>
    <section class="document another-page-document">
        <div class="container">
            <div class="row document-main_row">
                <?php foreach ($depository->files as $file): ?>
                    <?= $this->render('../layouts/_file', [
                        'file' => $file,
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"><g><g><g><g><g><path fill="#fff" d="M14.867 13.707a.43.43 0 0 0-.43.43v2.965a2.15 2.15 0 0 1-2.148 2.148H7.65a.43.43 0 0 0-.429.43v.854l-1.026-1.026a.43.43 0 0 0-.394-.258H3.008a2.15 2.15 0 0 1-2.149-2.148v-6.618a2.15 2.15 0 0 1 2.149-2.148h4.34a.43.43 0 0 0 0-.86h-4.34A3.011 3.011 0 0 0 0 10.485v6.618a3.011 3.011 0 0 0 3.008 3.007H5.58l1.765 1.765a.43.43 0 0 0 .733-.303l.001-1.462h4.21a3.011 3.011 0 0 0 3.008-3.007v-2.965a.43.43 0 0 0-.43-.43z"/></g></g></g><g><g><g><path fill="#fff" d="M18.991 10.55a.43.43 0 0 0-.17.344v1.658l-1.052-1.05a.43.43 0 0 0-.43-.108 5.387 5.387 0 0 1-1.584.237h-1.088a5.392 5.392 0 0 1-5.386-5.386A5.392 5.392 0 0 1 14.667.86h1.088a5.392 5.392 0 0 1 5.386 5.386 5.346 5.346 0 0 1-2.15 4.305zM15.755 0h-1.088a6.252 6.252 0 0 0-6.245 6.245 6.252 6.252 0 0 0 6.245 6.246h1.088c.537 0 1.07-.069 1.585-.204l1.606 1.606a.43.43 0 0 0 .734-.304v-2.486A6.305 6.305 0 0 0 21.32 9.08c.45-.883.679-1.836.679-2.834A6.252 6.252 0 0 0 15.755 0z"/></g></g></g><g><g><g><path fill="#fff" d="M17.146 4.702a1.823 1.823 0 0 0-1.687-1.687 1.805 1.805 0 0 0-1.369.485 1.826 1.826 0 0 0-.578 1.33.43.43 0 0 0 .86 0 .95.95 0 0 1 .304-.702.96.96 0 1 1 .866 1.638.813.813 0 0 0-.64.797v1.033a.43.43 0 0 0 .859 0v-.998a1.81 1.81 0 0 0 1.385-1.896z"/></g></g></g><g><g><g><path fill="#fff" d="M15.635 8.992a.433.433 0 0 0-.608 0 .433.433 0 0 0 0 .608.432.432 0 0 0 .608 0 .433.433 0 0 0 0-.608z"/></g></g></g><g><g><g><path fill="#fff" d="M11.816 13.32H2.75a.43.43 0 0 0 0 .86h9.066a.43.43 0 1 0 0-.86z"/></g></g></g><g><g><g><path fill="#fff" d="M12.12 15.852a.433.433 0 0 0-.607 0 .433.433 0 0 0 0 .608.433.433 0 0 0 .607 0 .432.432 0 0 0 0-.608z"/></g></g></g><g><g><g><path fill="#fff" d="M10.126 15.727H2.75a.43.43 0 0 0 0 .859h7.376a.43.43 0 0 0 0-.86z"/></g></g></g><g><g><g><path fill="#fff" d="M9.023 10.914H2.75a.43.43 0 0 0 0 .86h6.273a.43.43 0 1 0 0-.86z"/></g></g></g></g></g></svg>
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





<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $strategies shop\entities\shop\Strategy[] */
/* @var $strategyForm shop\forms\shop\StrategyForm */

$this->title = 'Стратегии';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Стратегии
        </h1>
    </div>
</div>
<?php if ($strategies): ?>
    <section class="actives-post strategy-post">
        <div class="container">
            <div class="row">
                <?php foreach ($strategies as $strategy): ?>
                    <div class="col-12 actives-post-item">
                        <div class="row">
                            <div class="col-lg-5 actives-post-item-img">
                                <img src="<?= $strategy->image ? $strategy->getThumbFileUrl('image', 'origin') : '' ?>" alt="<?= $strategy->image ?: '' ?>">
                            </div>
                            <div class="col-lg-7 actives-post-item-content">
                                <h3><?= Html::encode($strategy->title) ?></h3>
                                <?= Yii::$app->formatter->asHtml($strategy->description, [
                                    'Attr.AllowedRel' => array('nofollow'),
                                    'HTML.SafeObject' => true,
                                    'Output.FlashCompat' => true,
                                    'HTML.SafeIframe' => true,
                                    'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                                ]) ?>
                               <div class="vd_open_modal_wrapper">
                                   <a href="#advice-modal" class="open-modal-button
                                   button" data-name="<?= Html::encode($strategy->title) ?>">
                                        Узнать подробнее
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="partners">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h2-wrapper">
                    <h2>Партнерские программы</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-6 partners-item">
                <img src="<?= Url::base() ?>/img/partners-1.jpg" alt="partners-1.jpg">
            </div>
            <div class="col-md-3 col-sm-6 col-6 partners-item">
                <img src="<?= Url::base() ?>/img/partners-2.jpg" alt="partners-2.jpg">
            </div>
            <div class="col-md-3 col-sm-6 col-6 partners-item">
                <img src="<?= Url::base() ?>/img/partners-3.jpg" alt="partners-3.jpg">
            </div>
            <div class="col-md-3 col-sm-6 col-6 partners-item">
                <img src="<?= Url::base() ?>/img/partners-4.jpg" alt="partners-4.jpg">
            </div>
        </div>
    </div>
</section>



<div class="white-popup advice-popap mfp-hide" id="advice-modal">
    <div class="modal-strategy-block">
        <?php $form = ActiveForm::begin(['id' => 'advice-form', 'options' => ['class' => 'strategy-form']]) ?>
            <h2>Получить консультацию</h2>
<!--            <input type="hidden" name="advice_name" id="advice_name" value="">-->
            <?= $form->field($strategyForm, 'strategyName')->hiddenInput(['id' => 'advice_name', 'value' => ''])->label(false); ?>
            <?= $form->field($strategyForm, 'phone')->textInput(['class' => 'strategy-input', 'placeholder' => 'Введите ваш номер', 'data-mask' => 'callback-catalog-phone'])->label(false); ?>
<!--            <input type="tel" placeholder="Введите ваш номер" required class="strategy-input" data-mask="callback-catalog-phone">-->
            <button type="submit" class="button">Отправить</button>
        <?php ActiveForm::end() ?>
    </div>
</div>

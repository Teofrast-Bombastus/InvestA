<?php
/* @var $this yii\web\View */
/* @var $cashFlow shop\entities\shop\cashFlow\CashFlow */

$this->title = 'Получения дивидендов';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Ввод и вывод средств, правила получения дивидендов
        </h1>
    </div>
</div>
<section class="only-text">
    <div class="container">
        <div class="row">
            <div class="col-12 only-text-wrapper wow fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay="0.3s">
                <?= Yii::$app->formatter->asHtml($cashFlow->description, [
                    'Attr.AllowedRel' => array('nofollow'),
                    'HTML.SafeObject' => true,
                    'Output.FlashCompat' => true,
                    'HTML.SafeIframe' => true,
                    'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                ]) ?>
            </div>
        </div>
    </div>
</section>

<?php if ($cashFlow->files): ?>
    <section class="document another-page-document">
        <div class="container">
            <div class="row document-main_row">
                <?php foreach ($cashFlow->files as $file): ?>
                    <?= $this->render('../layouts/_file', [
                        'file' => $file,
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


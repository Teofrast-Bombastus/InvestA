<?php
/* @var $this yii\web\View */
/* @var $cooperation shop\entities\shop\cooperation\Cooperation */

$this->title = 'Условия сотрудничества';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Условия сотрудничества
        </h1>
    </div>
</div>
<section class="only-text">
    <div class="container">
        <div class="row">
            <div class="col-12 only-text-wrapper wow fadeInLeftBig" data-wow-duration="1.5s" data-wow-delay="0.3s">
                <?= Yii::$app->formatter->asHtml($cooperation->description, [
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

<?php if ($cooperation->files): ?>
    <section class="document another-page-document">
        <div class="container">
            <div class="row document-main_row">
                <?php foreach ($cooperation->files as $file): ?>
                    <?= $this->render('../layouts/_file', [
                        'file' => $file,
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


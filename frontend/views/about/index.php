<?php

/* @var $this yii\web\View */
/* @var $aboutUs shop\entities\shop\aboutUs\AboutUs */


$this->title = 'О компании';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            О компании Invest aktiv
        </h1>
    </div>
</div>

<section class="only-text">
    <div class="container">
        <div class="row">
            <div class="col-12 only-text-wrapper wow fadeIn" data-wow-duration="1.6s" data-wow-delay="0.4s">
                <?= Yii::$app->formatter->asHtml($aboutUs->description, [
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

<?php if (!empty($aboutUs->photos)): ?>
    <section class="license galery">
        <div class="container license-container">
            <div class="row">
                <?php $i = 0.3; ?>
                <?php foreach ($aboutUs->photos as $photo): ?>
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

<?php if (!empty($aboutUs->files)): ?>
    <section class="document">
        <div class="container">
        <div class="row document-main_row">
            <?php foreach ($aboutUs->files as $file): ?>

                <?= $this->render('../layouts/_file', [
                    'file' => $file,
                ]) ?>

            <?php endforeach; ?>
        </div>
    </div>
    </section>
<?php endif; ?>
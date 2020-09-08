<?php


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $asset shop\entities\shop\Asset */

$this->title = Html::encode($asset->title);
$this->params['breadcrumbs'][] = ['label' => 'Активы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Активы
        </h1>
    </div>
</div>
<section class="only-text">
    <div class="container">
        <div class="row">
            <div class="col-12 only-text-wrapper wow fadeIn" data-wow-duration="1.6s" data-wow-delay="0.4s">
                <div class="active-vidget">
                    <div class="active-vidget-image-wrapper">
                        <div class="active-vidget-image-wrapper-img" style="background-image: url('<?= $asset->image ? $asset->getThumbFileUrl("image", "origin") : "" ?>');"></div>
                        <p class="active-vidget-name">
                            <?= $this->title ?>
                        </p>
                    </div>
                </div>
                <div class="v__wrapper-animation wow fadeIn" ata-wow-duration="1.6s" data-wow-delay="0.9s">
                    <?= Yii::$app->formatter->asHtml($asset->description, [
                        'Attr.AllowedRel' => array('nofollow'),
                        'HTML.SafeObject' => true,
                        'Output.FlashCompat' => true,
                        'HTML.SafeIframe' => true,
                        'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</section>






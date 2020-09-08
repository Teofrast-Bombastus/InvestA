<?php

use yii\helpers\Url;

/* @var  $this yii\web\View; */
/* @var $depository shop\entities\shop\aboutUs\AboutUs */

$this->title = 'Депозитарий/Единый реестр аукционеров';
$this->params['active_url'] = Url::to(['cabinet/register/index']);

?>


<h1>Единый реестр акционеров</h1>
<?php if (!empty($depository)) : ?>

    <div class="register-wrap">
        <?= Yii::$app->formatter->asHtml($depository->description, [
            'Attr.AllowedRel' => array('nofollow'),
            'HTML.SafeObject' => true,
            'Output.FlashCompat' => true,
            'HTML.SafeIframe' => true,
            'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
        ]) ?>
    </div>

<?php endif; ?>

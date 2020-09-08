<?php

/* @var $this yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;


AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <!-- <base href="/"> -->

    <meta name="interkassa-verification" content="1521fb3225d34b2a895bf255a59bd2f3" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Template sadas Basic Images Start -->
    <meta property="og:image" content="path/to/image.jpg">
    <link rel="icon" href="<?= Url::base() ?>/img/favicon/favicon46x46.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::base() ?>/img/favicon/favicon180X180.png">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#fff">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#fff">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#fff">


    <meta name="yandex-verification" content="493efb2e38e2df15" />

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<body>
    <?php $this->beginBody() ?>


    <?= $content ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-grid.min.css',
        'css/jquery.fancybox.min.css',
        'css/magnific-popup.css',
        'css/animate.css',
        'css/slick.css',
        'css/style.css',

    ];
    public $js = [
        'js/jquery.fancybox.min.js',
        'js/jquery.spincrement.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/mask.js',
        'js/slick.min.js',
        'js/wow.min.js',
        'js/jquery.date-dropdowns.min.js',
        'js/common.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
}

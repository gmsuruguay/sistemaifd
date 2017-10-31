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
        'css/materialize.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/materialize.js',
        'js/init.js',
        'js/alert.js',
    ];
    public $depends = [       
        'yii\web\YiiAsset',
    ];
}
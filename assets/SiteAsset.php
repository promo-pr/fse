<?php

namespace app\assets;

use Yii;
use yii\web\AssetBundle;

class SiteAsset extends AssetBundle
{
    public $sourcePath = '@app/assets';
    public $css = [
        'css/jquery.bxslider.min.css',
        'css/site.css'
    ];
    public $js = [
        'js/lib.js',
        'js/jquery.bxslider.min.js',
        'js/site.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'promo\icons\IconsAsset'
    ];

    public function init()
    {
        parent::init();
        Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
            'css' => []
        ];
        Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapPluginAsset'] = [
            'js' => []
        ];
    }

}

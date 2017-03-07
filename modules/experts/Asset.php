<?php

namespace app\modules\experts;

use yii\web\AssetBundle;

class Asset extends AssetBundle
{
    public $sourcePath = '@app/modules/experts/assets';
    public $css = [
        //'css/slider.css',
    ];
    public $js = [
        'js/media.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'vova07\imperavi\Asset',
        'app\modules\experts\SortableAsset',
    ];
}

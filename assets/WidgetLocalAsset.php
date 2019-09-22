<?php

namespace uraankhayayaal\sortable\assets;

use yii\web\AssetBundle;

class WidgetLocalAsset extends AssetBundle
{
    public $sourcePath = '@vendor/uraankhayayaal/yii2-sortable/assets/src/';

    public $js = [
        'jquery.binding.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'uraankhayayaal\sortable\assets\RubaxaLocalAsset',
    ];
}
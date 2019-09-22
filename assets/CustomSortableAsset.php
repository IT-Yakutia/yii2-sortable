<?php

namespace uraankhayayaal\sortable\assets;

use yii\web\AssetBundle;

class CustomSortableAsset extends AssetBundle
{
    public $sourcePath = '@vendor/uraankhayayaal/yii2-sortable/assets/src/';

    public $js = [
        'custom-sortable-widgets.js',
    ];

    public $css = [
    	// 'custom-sortable-widgets.css',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}
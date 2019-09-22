<?php

namespace uraankhayayaal\sortable\assets;

use yii\web\AssetBundle;

class SortableAsset extends AssetBundle
{
    public $sourcePath = '@vendor/uraankhayayaal/yii2-sortable/assets/src/';

    public $js = [
        'sortable-widgets.js',
    ];

    public $css = [
    	'sortable-widgets.css',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}
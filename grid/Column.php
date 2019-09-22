<?php

namespace uraankhayayaal\sortable\grid;

use uraankhayayaal\sortable\assets\SortableAsset;
use uraankhayayaal\sortable\assets\WidgetCdnAsset;
use uraankhayayaal\sortable\assets\WidgetLocalAsset;
use yii\helpers\Html;
use yii\web\View;

class Column extends \yii\grid\Column
{
    public $headerOptions = ['style' => 'width: 30px;'];

    public function init()
    {
        WidgetLocalAsset::register($this->grid->view);
        SortableAsset::register($this->grid->view);
        $this->grid->view->registerJs('initSortableWidgets();', View::POS_READY, 'sortable');
    }
    protected function renderDataCellContent($model, $key, $index)
    {
        $offset = 0;
        if ($this->grid->dataProvider->pagination) {
            $offset = $this->grid->dataProvider->pagination->pageSize * $this->grid->dataProvider->pagination->page;
        }
        
        return Html::tag('div', '&#9776;', [
            'class' => 'sortable-widget-handler',
            'data-id' => $model->getPrimaryKey(),
            'data-offset' => $offset
        ]);
    }
}
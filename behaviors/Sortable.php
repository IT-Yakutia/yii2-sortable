<?php

namespace uraankhayayaal\sortable\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Query;

class Sortable extends Behavior
{
    public $query;
    public $orderAttribute = 'sort';
    
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
        ];
    }
    public function beforeInsert()
    {
        $last = $this->query->orderBy([$this->orderAttribute => SORT_DESC])->limit(1)->one();
        if ($last === null) {
            $this->owner->{$this->orderAttribute} = 1;
        } else {
            $this->owner->{$this->orderAttribute} = $last->{$this->orderAttribute} == null ? 0 : $last->{$this->orderAttribute} + 1;
        }
    }
}
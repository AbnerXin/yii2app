<?php

namespace frontend\models;

use Yii;
use yii\mongodb\ActiveRecord;

class Mongo extends ActiveRecord
{
    public static function collectionName()
    {
        return 'mongo';
    }

    public function attributes()
    {
        return ['_id', 'name', 'address', 'status'];
    }

    public function fields()
    {
        return ['name'];
    }

}
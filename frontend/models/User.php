<?php

namespace frontend\models;

use Yii;
use yii\mongodb\ActiveRecord;

class User extends ActiveRecord
{
    public static function collectionName()
    {
        return 'user';
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
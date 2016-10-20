<?php
	namespace backend\models;

use Yii;
use yii\mongodb\ActiveRecord;

class User extends ActiveRecord
{
    public static function collectionName()
    {
        return 'result';
    }

    public function attributes()
    {
        return ['name',];
    }

    
    public function fields()
    {
        return ['name'];
    }

}

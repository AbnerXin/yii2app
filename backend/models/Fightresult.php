<?php

namespace backend\models;

use Yii;
use yii\mongodb\ActiveRecord;
use yii\mongodb\Query;

class Fightresult extends ActiveRecord 
{
    public static function collectionName()
    {
        return 'fightresult';
    }

    public function attributes()
    {
        return ['name1', 'name2', 'winner','_id'];
    }

    
    public function fields()
    {
        return ['name1','name2','winner'];
    }

    public function saveResult($name1,$name2,$winnerName)
    {
        $this->winner = $winnerName;
        $this->name1 = $name1;
        $this->name2 = $name2;
        $this->save();
        $response = Yii::$app->response;
    }
    public function allFightResult()
    {
        $query = new Query();
        // compose the query
        $query->select(['name1','name2','winner'])->from('fightresult');
        return $query->all();
    }

    public function winnerTimes()
    {
        $result = $this->allFightResult();
        $winnerGroup = array();
        foreach ($result as $results)
            $winnerGroup[] = $results['winner'];
        $winnerTimes = array_count_values($winnerGroup);
        return $winnerTimes;
    }
}
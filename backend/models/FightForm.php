<?php
namespace backend\models;

use yii;
use yii\base\Model;
use backend\models\User;
use yii\mongodb\Query;

class FightForm extends Model
{
    public $name1;
    public $name2;
    public $winner;
    public $isWeightEqual;


    public function rules()
    {
        return [
            [
                ['name1', 'name2'], 'required'],
            ];
    }

    public function calculateWeight($name)
    {
        $nameLen = strlen($name);
        $random = rand(0,10);
        $numOfE = substr_count($name,"e");
        $weight = 0.6 * $nameLen + 0.3 * $random + 0.1 * $numOfE;
        return $weight;
    }


    public function queryWinTimes($name)
    {
        $query = new Query();
        $query->select(['winner'])->from('fightresult')->where(['winner'=>$name]);
        $rows = $query->all();
        $response = Yii::$app->response;
        $count = count($rows);
        return $count;
    }

    public function compNameWeight()
    {
        if ($this->calculateWeight($this->name1) == $this->calculateWeight($this->name2)) {
            $this->isWeightEqual = 1;
            return 0;
        } else { 
            $this->isWeightEqual = 0;
        }
        if ($this->calculateWeight($this->name1) > $this->calculateWeight($this->name2)) {
            $this->winner = $this->name1;
        } else {
            $this->winner = $this->name2;
        }
        return 1;
    }
}


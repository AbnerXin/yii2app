<?php
namespace backend\models;


use yii\base\Model;

class EntryForm extends Model
{
    public $name1;
    public $name2;
    public $count1;
    public $count2;
    public $winner;


    public function rules()
    {
        return [
            [
            	['name1', 'name2'], 'required'],
            ];
       }
    public function calculateWeight($name){
		$nameLen = strlen ($name);
		$random = rand (0,10);
		$numOfE = substr_count($name,"e");
		$weight = 0.6 * $nameLen + 0.3 * $random + 0.1 * $numOfE;
		return $weight;
	}
}

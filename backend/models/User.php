<?php

namespace backend\models;

use Yii;
use yii\mongodb\Query;
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

    public function userInsert()
    {
        $nameList =array ('AbnerXin', 'StanXing', 'CarsonDai','SidneyLI','MerlinWang','RogersYou','JuliaYang','CarinaWei','BonnieZhang','RalphLi','DavisWei','WilsonWen');
        for ($i = 0;$i < count($nameList);$i++) {
            $user = new User();
            $user->name = $nameList[$i];
            $user->save();
        }
    }

    public function getUser()
    {
        $query = new Query();
        $query->select(['name'])->from('user');
        $rows = $query->all();
        $array = array();
        $i=0;
        while($i < count($rows)) {
            $array[$i] = $rows[$i]['name'];
            $i++;
        }
        return $array;
    }

    public function sortByLenInc($name1,$name2)
    {
        if (strlen($name1) == strlen($name2)){
            return strcmp($name1, $name2);
        } else {
            return strlen($name1) > strlen($name2) ? 1 : -1;
        }
    }

    public function sortByLenDec($name1,$name2)
    {
        if (strlen($name1) == strlen($name2)){
            return strcmp($name1, $name2);
        } else {
            return strlen($name1) > strlen($name2) ? -1 : 1;
        }
    }

    public function randNumArr($min, $max, $num)
    {
        $count = 0;
        $return = array();
        while ($count < $num) {
            $return[] = mt_rand($min, $max);
            $return = array_flip(array_flip($return));
            $count = count($return);
        }
        shuffle($return);
        return $return;
    }

    public function printRandomPickName($nameList, $random)
    {
        $namArray = $this->randNumArr(0, count($nameList), $random);
        for ($i = 0; $i < $random ; $i++) {
            $randomNameList[$i] = $nameList[$namArray[$i]];
        }
        return $randomNameList;
    }

    public function sortNameList($order,$nameList)
    {
        if ($order == -1) {
            usort($nameList, array($this, "sortByLenDec"));
        } else {
            usort($nameList, array($this, "sortByLenInc"));
        }
        return $nameList;
    }

}
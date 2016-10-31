<?php

namespace backend\controllers;

use Yii;
use yii\mongodb\Query;
use yii\web\Controller;
use backend\models\User;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



class UserController extends Controller
{
    public function actionIndex()
    {
        return User::find([])->all();
    }

    public function actionInsert() 
    {
        $user = new User();
        $nameList = $user->userInsert();

        return User::find([])->all();
    }

    public function actionUserquery() 
    {
        $user = new User();
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $nameList = $user->getUser();

        return $nameList;
    }

    public function actionOrderuser() 
    {
        $user = new User();
        $orderVal = Yii::$app->request->get('order','');
        $sortedNameList = $user->sortNameList($orderVal, $user->getUser());
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;

        return $sortedNameList;
    }

    public function actionRandompick() 
    {
        $user = new User();
        $randomVal = Yii::$app->request->get('random','');
        $randomPickName = $user->printRandomPickName($user->getUser(), $randomVal);
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        
        return $randomPickName;
    }
}
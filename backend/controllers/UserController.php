<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\User;
use yii\mongodb\Query;



class UserController extends Controller
{
    public function actionInsert() 
    {
        $user = new User();
        $nameList = $user->userInsert();
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;

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
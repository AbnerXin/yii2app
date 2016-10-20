<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\User;
use yii\mongodb\Query;
use backend\models\EntryForm;

/**
 * Site controller
 */


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     */
  




    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /////////
  public function actionUser()
    {
        $user = new User();
        $user->name = 'rogers';
        $user->save();
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
       return User::find([])->all();
    }


    public function actionUserquery(){

        $query = new Query();
        // compose the query
        $query->select(['name'])
        ->from('user');
       
        // execute the query
        $rows = $query->all();
        $array = array();
       // echo json_encode($rows);
       // echo $rows[0]['name'];
        $i=0;
        while($i < count($rows)){
            $array[$i] =$rows[$i]['name'];
            $i++;
        }   
       // echo json_encode($array);


        $orderVal = Yii::$app->request->get('order','');
      

        
        if ($orderVal == -1){

            usort ($array, array('backend\controllers\SiteController','sortByLenDec'));

            foreach ($array as $key => $value){
                echo "$key : $value ";
                echo "<br \>";  
            }
        }
        else if ($orderVal != -1 && $orderVal !=NULL){
            usort ($array, array('backend\controllers\SiteController','sortByLenInc'));

            foreach ($array as $key => $value){
                echo "$key : $value ";
                echo "<br \>";  
            }
        }

        else {
            $randomVal = Yii::$app->request->get('random','');

            $arr = self::randNumArr(0, count($array), $randomVal);
            sort($arr);

            for ($i = 0; $i < $randomVal ; $i++){
                echo $array[$arr[$i]];
                echo "<br \>";
            }
        }
    }   

    
    
    static function sortByLenInc($name1,$name2){
        if (strlen($name1) == strlen($name2)){
        
        return strcmp($name1, $name2);
        } else {        
        return strlen($name1) > strlen($name2) ? 1 : -1;    
        }           
    }



    static function sortByLenDec($name1,$name2){
        if (strlen($name1) == strlen($name2)){
        
        return strcmp($name1, $name2);
        } else {        
        return strlen($name1) > strlen($name2) ? -1 : 1;    
        }
    }


    static function randNumArr($min, $max, $num) {
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




    
   
    
      public function actionEntry()
    {
        $model = new EntryForm();
        $count1 = 0;
        $count2 = 0;

        

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {


        
            
            $name1Weight = $model->calculateWeight($model->name1);
            $name2Weight = $model->calculateWeight($model->name2);
           
            if ( $name1Weight> $name2Weight){
                $model->winner = $model->name1;
              
            }
            else{
                $model->winner = $model->name2;
             
            }    
             $user = new User();
        $user->name = $model->winner;
        $user->save();
        $response = Yii::$app->response;

        $query = new Query();
        // compose the query
        $query->select(['name'])->from('user')->where(['name'=>$model->name1]);

        $rows = $query->all();

        $response = Yii::$app->response;

        


        $query2 = new Query();
        // compose the query
        $query2->select(['name'])->from('user')->where(['name'=>$model->name2]);


        $response = Yii::$app->response;

        $rows2 = $query2->all();

        $count1 = count($rows);
        $count2 = count($rows2);
        
        $model->count1 = $count1;
        $model->count2 = $count2;
            
                return $this->render('entry-confirm', ['model' => $model]);
            } else {
            
            return $this->render('entry', ['model' => $model]);
            }
    }
}


?>
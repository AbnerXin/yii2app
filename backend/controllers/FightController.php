<?php 
namespace backend\controllers;

use Yii;
use yii\mongodb\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\Fightresult;
use backend\models\FightForm;

class FightController extends Controller
{

    public function actionFight()
    {
        $model = new FightForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (!($model->compNameWeight())) {
                return $this->render('nowinner',['$model'=>$model]);
            } 

            $winner = new Fightresult();
            $winner->saveResult($model->name1,$model->name2,$model->winner);

            return $this->render('fight', ['model' => $model]);
        } else {
            return $this->render('fight', ['model' => $model]);
        }
    }

    public function actionResult()
    {
        $fightresult = new Fightresult();
        $results = $fightresult->allFightResult();
        $winnerTimes = $fightresult->winnerTimes();

        return $this->render('fightwinner', ['results' => $results,'winnerTimes'=>$winnerTimes]);
    }
}
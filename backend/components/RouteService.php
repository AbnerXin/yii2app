<?php
namespace backend\components;

use Yii;
use Yii\base\Component;

class RouteService extends Component
{
    public function init()
    {
        Yii::$app->getUrlManager()->addRules(require(__DIR__ . '/../config/routes.php'));
        parent::init();
    }
}

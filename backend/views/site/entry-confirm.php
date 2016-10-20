<?php
use yii\helpers\Html;
?>


<ul>
    <li><label>The Winner is</label>: <?= Html::encode($model->winner) ?></li>
 
 
  <li><label>1:			</label>: <?= Html::encode($model->count1) ?></li>
  <li><label>2:			</label>: <?= Html::encode($model->count2) ?></li>

 </ul>
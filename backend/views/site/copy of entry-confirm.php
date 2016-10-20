<?php
use yii\helpers\Html;
?>
<!-- <p>You have entered the following information:</p>
 -->
<ul>
 <!--    <li><label>Name</label>: <?= Html::encode($model->name1) ?></li>
    <li><label>Name</label>: <?= Html::encode($model->name2) ?></li> -->
    <?php
    function calculateWeight($name){
		$nameLen = strlen ($name);
		$random = rand (0,10);
		$numOfE = substr_count($name,"e");
		$weight = 0.6 * $nameLen + 0.3 * $random + 0.1 * $numOfE;
		return $weight;
	}
	
	$name1Weight = calculateWeight($model->name1);
	$name2Weight = calculateWeight($model->name2);
		echo "The winner is :";
	if ( $name1Weight> $name2Weight)
		echo $model->name1;
	else
		echo $model->name2;
    ?>
</ul>
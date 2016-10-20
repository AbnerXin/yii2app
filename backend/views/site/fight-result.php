

<?php
use yii\helpers\Html;
?>
<h2>Fight Result</h2>

<ul>
<?php
	foreach($fights as $fight):
?>
    <li><?= Html::encode($fight['name1']) ?> vs <?= Html::encode($fight['name2']) ?>, winner is <?= Html::encode($fight['winner']) ?></li>
<?php
	endforeach;
?>
</ul>
<hr>
<!-- <ul>
<?php
/*	foreach($winnerAndTimes as $key=>$value):*/
?>
    <li><?= $key ?> win <?= $value ?> times.</li>
<?php
/*	endforeach;*/
?>
</ul> -->


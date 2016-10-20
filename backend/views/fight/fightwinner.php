<?php
use yii\helpers\Html;
?>
<ul>
<?php
    foreach($results as $result):
?>
    <li><?= Html::encode($result['name1']) ?> vs <?= Html::encode($result['name2']) ?>, winner is <?= Html::encode($result['winner']) ?></li>
<?php
    endforeach;
?>

<?php
    foreach($winnerTimes as $key=>$value):
?>
    <li><?= $key ?> win <?= $value ?> times.</li>
<?php
    endforeach;
?>
</ul>
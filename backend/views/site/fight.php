

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model,'name1') ?>
	<?= $form->field($model,'name2') ?>
	<div class="form-group">
	<?= Html::submitButton('Compare', ['class' => 'btn btn-primary']) ?>
	</div>
<?php ActiveForm::end(); ?>

<?php
	if ():
?>
<p><?= Html::encode($model->name1) ?> vs <?= Html::encode($model->name2) ?>, winner is <?= $winner ?></p>
<?php
	endif;
?>


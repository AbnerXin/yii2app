<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name1') ?>
    <?= $form->field($model, 'name2') ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>



<?php
    if($model->validate()){
?>

<p><?= Html::encode($model->name1) ?> vs <?= Html::encode($model->name2) ?>, winner is <?= $model->winner ?></p>

<?php
} 
?>




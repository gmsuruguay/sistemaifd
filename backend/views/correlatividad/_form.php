<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Correlatividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correlatividad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'materia_id')->textInput() ?>

    <?= $form->field($model, 'materia_id_correlativa')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

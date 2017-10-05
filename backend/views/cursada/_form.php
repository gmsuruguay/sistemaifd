<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cursada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_inscripcion')->textInput() ?>

    <?= $form->field($model, 'condicion_id')->textInput() ?>

    <?= $form->field($model, 'alumno_id')->textInput() ?>

    <?= $form->field($model, 'materia_id')->textInput() ?>

    <?= $form->field($model, 'nota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_vencimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

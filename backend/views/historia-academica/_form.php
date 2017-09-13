<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HistoriaAcademica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historia-academica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_inscripcion')->textInput() ?>

    <?= $form->field($model, 'alumno_id')->textInput() ?>

    <?= $form->field($model, 'materia_id')->textInput() ?>

    <?= $form->field($model, 'condicion_id')->textInput() ?>

    <?= $form->field($model, 'libro')->textInput() ?>

    <?= $form->field($model, 'folio')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'nota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asistencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_inscripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_vencimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

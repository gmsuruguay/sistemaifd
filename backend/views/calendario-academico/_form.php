<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioAcademico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendario-academico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_desde')->textInput() ?>

    <?= $form->field($model, 'fecha_hasta')->textInput() ?>

    <?= $form->field($model, 'tipo_inscripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actividad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

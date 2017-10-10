<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sede */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sede-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secretario_academico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vice_rector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

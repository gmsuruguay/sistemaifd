<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sede */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sede-form">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Datos de la Institución Educativa</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="box-body">
            <?= $form->field($model, 'cue')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'secretario_academico')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'rector')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'vice_rector')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'localidad')->textInput(['maxlength' => true]) ?>            
        </div>
        <div class="box-footer">
         <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div> 

        <?php ActiveForm::end(); ?>
    </div>
</div>

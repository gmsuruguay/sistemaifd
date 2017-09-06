<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Materia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materia-form">

    <?php $form = ActiveForm::begin(['options' => ['id'=>'materia-carrera','data-pjax' => true ]]); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>    

    <?php
     $listData= [
        '1'=>'Primer año',
        '2'=>'Segundo año',
        '3'=>'Tercer año',
        '4'=>'Cuarto año',
        '5'=>'Quinto año',
     ];
     echo $form->field($model, 'anio')->dropDownList($listData,['prompt'=>'Seleccione a que año pertenece la materia'])
     
    ?>    

    <div class="form-group">
        <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

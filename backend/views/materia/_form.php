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
     $listData= array("1"=>"1° AÑO","2"=>"2° AÑO","3"=>"3° AÑO","4"=>"4° AÑO","5"=>"5° AÑO");
     echo $form->field($model, 'anio')->dropDownList($listData,['prompt'=>'Seleccione a que año pertenece la materia'])
     
    ?>   

    <?php
     $listData= array("1° C"=>"1° C","2° C"=>"2° C","ANUAL"=>"ANUAL");
     echo $form->field($model, 'periodo')->dropDownList($listData,['prompt'=>'Seleccione periodo de duración'])
     
    ?>    

    <div class="form-group">
        <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

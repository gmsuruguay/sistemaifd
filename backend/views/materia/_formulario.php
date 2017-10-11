<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Materia */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Nueva Materia';
$this->params['breadcrumbs'][] = ['label' => $carrera, 'url' => ['/carrera/view','id'=>$id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="materia-form">

    <div class="panel panel-default">
        <div class="panel-body">
           <b>Carrera: </b> <?=$carrera?>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Materia</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>    
        <div class="box-body">
        <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'placeholder' => "Nombre de la materia"]) ?>    

        <?php
        $listData= array("1"=>"1° AÑO","2"=>"2° AÑO","3"=>"3° AÑO","4"=>"4° AÑO","5"=>"5° AÑO");
        echo $form->field($model, 'anio')->dropDownList($listData,['prompt'=>'Seleccione a que año pertenece la materia'])
        
        ?>   

        <?php
        $listData= array("1° C"=>"1° C","2° C"=>"2° C","ANUAL"=>"ANUAL");
        echo $form->field($model, 'periodo')->dropDownList($listData,['prompt'=>'Seleccione periodo de duración'])
        
        ?>    

        <?= $form->field($model, 'condicion_id')->dropDownList($model->listaCondicion,['prompt'=>'Seleccione condición']) ?>
        
        <?php
        $listData= array("1"=>"LIBRE","2"=>"LIBRE CON OPCION","3"=>"NO SE PUEDE RENDIR LIBRE");
        echo $form->field($model, 'condicion_examen_libre')->dropDownList($listData,['prompt'=>'Seleccione condición para rendir exámen libre'])
        
        ?>  
        </div>
        <div class="box-footer">
        <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>   
        <?php ActiveForm::end(); ?>
    </div>

</div>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Sede;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrera-form">    

    <div class="box">
            <div class="box-header with-border">                
                <h3 class="box-title">Datos Carrera</h3>
            </div>
            <?php $form = ActiveForm::begin(); ?>

            <div class="box-body">

                <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'duracion')->textInput() ?>

                <?= $form->field($model, 'cohorte')->textInput(['maxlength' => true]) ?>  

                <?= $form->field($model, 'validez_nacional')->textInput(['maxlength' => true]) ?>  

                <?= $form->field($model, 'cantidad_materias')->textInput(['maxlength' => true]) ?>  

                <?= $form->field($model, 'cantidad_horas')->textInput(['maxlength' => true]) ?>   

                <?= $form->field($model, 'nro_resolucion')->textInput(['maxlength' => true]) ?>  

                <?= $form->field($model, 'sede_id')->dropDownList(Sede::getListaSedes(),['prompt'=>'Sede en donde se dicta la Carrera']) ?> 

                                   
                
            </div>  
            <div class="box-footer">
                    <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            </div>   
            <?php ActiveForm::end(); ?>
    </div>

</div>

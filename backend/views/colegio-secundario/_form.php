<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ColegioSecundario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colegio-secundario-form">

    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Datos Colegio</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>

        <div class="box-body">

            <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'placeholder'=>'Nombre del Colegio Secundario']) ?>           
            
        </div>  
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>   
        <?php ActiveForm::end(); ?>
    </div>

</div>

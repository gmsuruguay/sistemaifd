<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Autoridades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autoridades-form">   

    <div class="box">
            <div class="box-header with-border">                
                <h3 class="box-title">Información Institucional</h3>
            </div>
            <?php $form = ActiveForm::begin(); ?>

            <div class="box-body">
           
                <?= $form->field($model, 'rector')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'secretario_academico')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'vice_rector')->textInput(['maxlength' => true]) ?>                  
                
            </div>  
            <div class="box-footer">
                    <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            </div>   
            <?php ActiveForm::end(); ?>
    </div>

</div>

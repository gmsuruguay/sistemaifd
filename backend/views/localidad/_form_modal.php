<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Localidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localidad-form">

    
            <?php $form = ActiveForm::begin(['id'=>'localidad']); ?>

                <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true,'placeholder'=>'Nombre de la Localidad']) ?>           
          
            <div class="form-group">
                    <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            </div>   
            <?php ActiveForm::end(); ?>
    

</div>
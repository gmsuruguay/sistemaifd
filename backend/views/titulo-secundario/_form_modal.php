<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TituloSecundario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titulo-secundario-form">
    
        <?php $form = ActiveForm::begin(['id'=>'titulo-secundario']); ?>

            <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>           
        
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>   
        <?php ActiveForm::end(); ?>  
</div>

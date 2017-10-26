<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;
use backend\models\Localidad;

/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */
/* @var $form yii\widgets\ActiveForm */
$this->title="Actualizar datos de contacto";
?>

<div class="update-form">    

        <h1><?=$this->title?></h1>
        <?php $form = ActiveForm::begin(); ?>

        

        <div class="row">
            <div class="col-md-5">
             <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-1">
            <?= $form->field($model, 'nro')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">           
            
                <?= $form->field($model, 'localidad_id')->widget(Select2::classname(), [

                                'data' => Localidad::getlistaLocalidades(),
                                'language' => 'es',
                                'options' => ['placeholder' => 'Seleccione localidad'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                ])

                ?>
            </div>
         </div>   
         <div class="row">
            <div class="col-md-3">
            <?= $form->field($model, 'telefono',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone-alt"></i>']]
                            ])->widget( MaskedInput::className(), [                           
                            'mask' => '9',
                            'clientOptions' => ['repeat' => 15, 'greedy' => false]
                        ]) ?>
            </div>
            <div class="col-md-3">
            <?= $form->field($model, 'celular',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
                            ])->widget( MaskedInput::className(), [                           
                            'mask' => '9',
                            'clientOptions' => ['repeat' => 15, 'greedy' => false]
                        ]) ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'email',[
                                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']]
                                            ])->textInput(['placeholder'=>"Correo electrónico"])?>
            </div>
         </div> 

                                
            
        
        <div class="form-group">
                <?= Html::submitButton( '<i class="glyphicon glyphicon-floppy-disk"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>   
        <?php ActiveForm::end(); ?>


</div>

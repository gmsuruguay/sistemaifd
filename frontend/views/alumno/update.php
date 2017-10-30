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

        <h3><?=$this->title?></h3>
        <?php $form = ActiveForm::begin(['class'=>'col s12 m12']); ?>

        

         <div class="row">
                <?= $form->field($model, 'domicilio',['options'=>['class'=>'input-field col m9']])->begin() ?>
                    <?= Html::activeInput('text',$model,'domicilio'); ?>
                    <label for="alumno-domicilio">Domicilio</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>

                <?= $form->field($model, 'nro',['options'=>['class'=>'input-field col m3']])->begin() ?>
                    <?= Html::activeInput('text',$model,'nro'); ?>
                    <label for="alumno-nro">Nro</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>             
                   
                  
         </div>  
         <div class="row">
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
         <div class="row">
                 <?= $form->field($model, 'telefono',['options'=>['class'=>'input-field col m3']])->begin() ?>
                    <?= Html::activeInput('text',$model,'telefono'); ?>
                    <label for="alumno-telefono">Telefono</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>

                <?= $form->field($model, 'celular',['options'=>['class'=>'input-field col m3']])->begin() ?>
                    <?= Html::activeInput('text',$model,'celular'); ?>
                    <label for="alumno-celular">Celular</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>

                <?= $form->field($model, 'email',['options'=>['class'=>'input-field col m6']])->begin() ?>
                    <?= Html::activeInput('email',$model,'email'); ?>
                    <label for="alumno-email">E-mail</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>
         </div> 

                                
            
        
        <div class="form-group">
        <?= Html::submitButton('<i class="material-icons left">save</i> GUARDAR', ['class' => 'btn waves-effect waves-light']) ?>
        </div>   
        <?php ActiveForm::end(); ?>


</div>

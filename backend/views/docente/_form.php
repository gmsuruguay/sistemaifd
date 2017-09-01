<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Docente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-form">

    <div class="box ">
        <div class="box-header with-border">            
            <h3 class="box-title">Datos Docente</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="box-body">
         <div class="row">
            <div class="col-md-2">  
            <?= $form->field($model, 'nro_legajo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-5">  
            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true])->label('* Apellido') ?>
            </div>
            <div class="col-md-5">  
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('* Nombre') ?>
            </div>
         </div>
         <div class="row">
            <div class="col-md-2">
            <?php
                        $listData=['dni'=>'DNI',
                                    'du'=>'DU',
                                    'pas'=>'PAS',
                                    'ci'=>'CI',
                                    'lc'=>'LC',
                                    'le'=>'LE'
                        ];
                            echo $form->field($model, 'tipo_doc')->dropDownList($listData, ['options'=>['dni'=>['Selected'=>true]]])->label('* Tipo doc');
                ?>
            </div>
            <div class="col-md-2">
            <?= $form->field($model, 'numero')->widget( MaskedInput::className(), [                           
                        'mask' => '9',
                        'clientOptions' => ['repeat' => 8, 'greedy' => false]
                ])->label('* Numero') ?>
            </div>
            <div class="col-md-3">
            <?= $form->field($model, 'fecha_nacimiento',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'dd-mm-yyyy']
                ]) ?>
            </div>
            <div class="col-md-5">
            <?= $form->field($model, 'lugar_nacimiento_id')->textInput(['maxlength' => true]) ?>
            </div>
            
         </div>
         <div class="row">
            <div class="col-md-1">

            </div>
         </div>
         <div class="row">
            <div class="col-md-1">

            </div>
         </div>            

           

            

           

            <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
           

            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'user_id')->textInput() ?>

        </div>                              
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
       
        </div>
        <?php ActiveForm::end(); ?>
    </div>       

</div>

<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Turno */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Nueva Inscripción';
?>
    
   
    <div class="row">
       <div class="col-md-8 col-md-offset-2">
        <div class="well">
            <div class="inscripcion-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'dni',[
                'addon' => [
                    'append' => [
                        'content' => Html::submitButton('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar', ['class'=>'btn btn-primary']), 
                        'asButton' => true
                    ]
                ]
                ])->widget( MaskedInput::className(), [                           
                        'mask' => '9',
                        'clientOptions' => ['repeat' => 8, 'greedy' => false],
                ])->textInput(['placeholder' => "Ingrese número DNI"])->label('* Numero Documento') ?>        

                <?php ActiveForm::end(); ?>

            </div>
            <div class="text-center">
                <?php
                if(isset($encontrado)){
                    if($encontrado){
                        // Encontrado
                        echo "<h3>Alumno: $alumno->nombreCompleto</h3>";
                        echo Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Continuar Inscripción', ['inscripcion/nuevo', 'id' => $alumno->id], ['class' => 'btn btn-primary']);
                    }else{
                        // NO Encontrado
                        echo "<h3>Alumno NO Encontrado</h3>";
                        echo Html::a('<i class="fa fa-user-plus"></i> Registrar', ['alumno/create', 'dni'=>$model->dni], ['class' => 'btn btn-primary']);
                    }
                }
                ?>
            </div>     
        </div>
       </div>        
    </div>

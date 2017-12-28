<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\InscripcionExamenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripcion-examen-search">

   
<div class="box">
            <div class="box-header with-border">                         
                <h3 class="box-title"><i class="fa fa-filter"></i> Criterios de búsqueda</h3>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>    
                
                <div class="row">
                    <div class="col-md-6">
                    <?= $form->field($model, 'id')->textInput(['placeholder'=>'Buscar por nro. de permiso']) ?>
                    
                    </div>
                    <div class="col-md-6">
                    <?= $form->field($model, 'alumno')->textInput(['placeholder'=>'Buscar por DNI o Apellido y Nombre']) ?>

                    </div>                  
                 
                </div>               
                 
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Buscar', ['class' => 'btn btn-primary']) ?>
                  
                </div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>


</div>

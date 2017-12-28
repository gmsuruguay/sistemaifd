<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Carrera;
/* @var $this yii\web\View */
/* @var $model backend\models\search\InscripcionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripcion-search">

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
                    <?= $form->field($model, 'alumno')->textInput(['placeholder'=>'Buscar por DNI o Apellido y Nombre']) ?>
                    </div>
                    <div class="col-md-6">
                      <?= $form->field($model, 'carrera_id')->widget(Select2::classname(), [
                
                                                'data' => Carrera::getListaCarreras(),
                                                'language' => 'es',
                                                'options' => ['placeholder' => 'Mostrar todos'],
                                                'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                                ])

                            ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                     <?= $form->field($model, 'nro_legajo') ?>
                    </div>
                    <div class="col-md-4">
                     <?= $form->field($model, 'nro_libreta') ?>
                    </div>
                    <div class="col-md-4">
                     <?= $form->field($model, 'estado')->dropDownList(['0'=>'PREINSCRIPTOS','1'=>'INSCRIPTOS'],['prompt'=>'Mostrar todos']) ?>
                    </div>
                    
                </div>

                
                
                

               

                

                <?php // echo $form->field($model, 'medico_derivador_id') ?>               

               

                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Buscar', ['class' => 'btn btn-primary']) ?>
                  
                </div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>
    
</div>

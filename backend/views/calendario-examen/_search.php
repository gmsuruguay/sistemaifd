<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use backend\models\Carrera;
use backend\models\TurnoExamen;
use kartik\select2\Select2;
use backend\models\Materia;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\search\CalendarioExamenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendario-examen-search">

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
                    <div class="col-md-3">
                     <?= $form->field($model, 'turno_examen_id')->dropDownList(TurnoExamen::getListaTurnos(),['prompt'=>'Mostrar todos']) ?> 
                    </div>                    
                    
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                      <?= $form->field($model, 'materia_id')->widget(Select2::classname(), [
                
                                                'data' => Materia::getListaMaterias(),
                                                'language' => 'es',
                                                'options' => ['placeholder' => 'Mostrar todos'],
                                                'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                                ])

                            ?>
                    </div>
                    <div class="col-md-3">
                     <?= $form->field($model, 'fecha_examen')->widget(DatePicker::classname(), [
                            'options' => ['placeholder' => '',                            
                            ],
                            
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'dd/mm/yyyy',
                                'todayHighlight' => true
                            ]
                            ]); ?>
                    </div>                    
                    
                </div>                               
                 
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Buscar', ['class' => 'btn btn-primary']) ?>
                  
                </div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>    

</div>

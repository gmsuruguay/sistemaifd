<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use backend\models\Alumno;
use backend\models\Carrera;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripcion-form">

    <div class="box ">
        <div class="box-header with-border">            
            <h3 class="box-title">Datos de la inscripcón</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="box-body">
            <?= $form->field($model, 'fecha')->textInput() ?>
            <?= $form->field($model, 'alumno_id')->widget(Select2::classname(), [                                            
                                                    'data' => Alumno::getListaAlumnos(),
                                                    'language' => 'es',
                                                    'options' => ['placeholder' => 'Buscar alumno por DNI o Apellido'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                    ]) ?>

            <?= $form->field($model, 'carrera_id')->widget(Select2::classname(), [                                            
                                                    'data' => Carrera::getListaCarreras(),
                                                    'language' => 'es',
                                                    'options' => ['placeholder' => 'Seleccione carrera'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                    ]) ?>

            <?= $form->field($model, 'nro_libreta')->textInput() ?>           

            <?= $form->field($model, 'observacion')->textarea(['rows' => 6]) ?>

        </div>                              
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
       
        </div>
        <?php ActiveForm::end(); ?>
    </div>     

</div>

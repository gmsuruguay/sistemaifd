<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use backend\models\Alumno;
use backend\models\Carrera;
use backend\models\TituloSecundario;
use backend\models\ColegioSecundario;
use yii\widgets\MaskedInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Inscripción a Carrera';
$this->params['breadcrumbs'][] = ['label' => 'Legajo del Alumno', 'url' => ['/alumno/view','id'=>$alumno->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="inscripcion-form">
    <div class="panel panel-default">
        <div class="panel-body">
        <i class="fa fa-user"> </i> <?=$alumno->nombreCompleto?>
        </div>
    </div>

    <div class="box ">
        <div class="box-header with-border">            
            <h3 class="box-title">Datos de la inscripcón</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="box-body">
            <?= $form->field($model, 'fecha',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ])->textInput(['value'=>date('d/m/Y')]) ?>
            <?= $form->field($model, 'nro_legajo')->textInput(['maxlength' => true]) ?>          
            
            <?= $form->field($model, 'carrera_id')->widget(Select2::classname(), [                                            
                                                    'data' => Carrera::getListaCarreras(),
                                                    'language' => 'es',
                                                    'options' => ['placeholder' => 'Seleccione carrera'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                    ]) ?>

           
            <?= $form->field($model, 'nro_libreta')->textInput() ?>            

            <label for="">Documentación Presentada</label>

            <?= $form->field($model, 'fotocopia_dni')->checkbox() ?>

            <?= $form->field($model, 'certificado_nacimiento')->checkbox() ?>

            <?= $form->field($model, 'titulo_secundario')->checkbox() ?>

            <?= $form->field($model, 'certificado_visual')->checkbox() ?>

            <?= $form->field($model, 'certificado_auditivo')->checkbox() ?>

            <?= $form->field($model, 'certificado_foniatrico')->checkbox() ?>

            <?= $form->field($model, 'foto')->checkbox() ?>

            <?= $form->field($model, 'constancia_cuil')->checkbox() ?>

            <?= $form->field($model, 'planilla_prontuarial')->checkbox() ?>       

            <?= $form->field($model, 'observacion')->textarea(['rows' => 6]) ?>
            
            <?= $form->field($model, 'estado')->radioList(array('0'=>'PREINSCRIPTO','1'=>'INSCRIPTO')); ?>

        </div>                              
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
       
        </div>
        <?php ActiveForm::end(); ?>
    </div>     

</div>

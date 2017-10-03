<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use backend\models\Alumno;
use backend\models\Carrera;
use backend\models\TituloSecundario;
use backend\models\ColegioSecundario;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;
use yii\helpers\Url;
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
            <?= $form->field($model, 'fecha',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ])->textInput(['value'=>date('d/m/Y')]) ?>
            <label class="control-label" for"inscripcion-alumno_id"><?=Html::button('Alumno', ['value'=>Url::to(['alumno/nuevo']),'class' => 'btn-link btnmodal'])?></label>
            <?php Pjax::begin(['id'=>'select-alumno']); ?>
            <?= $form->field($model, 'alumno_id')->widget(Select2::classname(), [                                            
                                                    'data' => Alumno::getListaAlumnos(),
                                                    'language' => 'es',
                                                    'options' => ['placeholder' => 'Buscar alumno por DNI o Apellido'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                    ])->label(false) ?>
            <?php Pjax::end(); ?>
            <?= $form->field($model, 'carrera_id')->widget(Select2::classname(), [                                            
                                                    'data' => Carrera::getListaCarreras(),
                                                    'language' => 'es',
                                                    'options' => ['placeholder' => 'Seleccione carrera'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                    ]) ?>

           
            <?= $form->field($model, 'nro_libreta')->textInput() ?>      

            <?= $form->field($model, 'titulo_secundario_id')->widget(Select2::classname(), [                                            
                                                    'data' => TituloSecundario::getListaTitulos(),
                                                    'language' => 'es',
                                                    'options' => ['placeholder' => 'Seleccione titulo secundario'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                    ]) ?>

            <?= $form->field($model, 'colegio_secundario_id')->widget(Select2::classname(), [                                            
                                                                'data' => ColegioSecundario::getListaColegios(),
                                                                'language' => 'es',
                                                                'options' => ['placeholder' => 'Seleccione colegio secundario'],
                                                                'pluginOptions' => [
                                                                    'allowClear' => true
                                                                ],
                                                                ]) ?>

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

        </div>                              
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
       
        </div>
        <?php ActiveForm::end(); ?>
    </div>     

</div>

<?php 
      Modal::begin([
        'header' => '<h3 class="text-center modal-title"><i class="fa fa-user"></i> Nuevo Alumno</h3>',
        'class'=>'modal',
        'size'=>'modal-lg', 
        'clientOptions' => ['backdrop' => 'static'],  
         ]);

        echo "<div class='modalContent'></div>";
        
      Modal::end();

?>

<?php
 $script = <<< JS
 $('.btnmodal').click(function(){
	$('.modal').modal('show')
	.find('.modalContent')
	.load($(this).attr('value'));
});

 $('body').on('beforeSubmit','form#alumno' , function(e){             
        ajax($(this),refrescarSelect);
        return false;
    });         
   
    
JS;
$this->registerJs($script);
?>
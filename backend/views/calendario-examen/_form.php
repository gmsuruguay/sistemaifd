<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use backend\models\Carrera;
use kartik\select2\Select2;
use backend\models\Materia;
use yii\widgets\MaskedInput;
use kartik\widgets\TimePicker;
use backend\models\TurnoExamen
/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioExamen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendario-examen-form">

    <div class="box">            
            <?php $form = ActiveForm::begin(); ?>
            <div class="box-body">

            <?= $form->field($model, 'carrera_id')->widget(Select2::classname(), [                                            
                                                    'data' => Carrera::getListaCarreras(),
                                                    'language' => 'es',
                                                    'options' => ['placeholder' => 'Seleccione carrera',
                                                
                                                    ],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],                                                    
                                                    ]) ?>          
            

            <?= $model->isNewRecord ?$form->field($model, 'materia_id')->label('Materias')->dropDownList([], ['prompt'=>'Seleccione materia']) : 
                        $form->field($model, 'materia_id')->label('Materias')->dropDownList(getListaMaterias())?>
            
            <?= $form->field($model, 'turno_examen_id')->dropDownList(TurnoExamen::getListaTurnos(),['prompt'=>'Seleccione turno de examen']) ?> 
           
            <?= $form->field($model, 'fecha_examen',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ])?>

            <?= $form->field($model, 'hora')->widget(TimePicker::classname(), [

                'pluginOptions' => [        
                'showMeridian' => false,
                'minuteStep' => 15,
                
                ],

                'addonOptions' => [
                'asButton' => true,
                'buttonOptions' => ['class' => 'btn btn-info']
                ]
            ]) ?>

            <?= $form->field($model, 'aula')->textInput(['maxlength' => true]) ?>
            </div>
            
            <div class="box-footer">
              <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>

            </div>
            <?php ActiveForm::end(); ?>
    </div>     

</div>



<?php
 $script = <<< JS

$('#calendarioexamen-carrera_id').change(function(){
    
    $.get("index.php?r=materia/listar",{id: $(this).val()})
    .done(function(data)
    {
        $("select#calendarioexamen-materia_id").html(data);
    });
    
});
 
JS;
$this->registerJs($script);
?>

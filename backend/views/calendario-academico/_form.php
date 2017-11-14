<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;
use backend\models\TurnoExamen;

/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioAcademico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendario-academico-form">

    <div class="box">        
        <?php $form = ActiveForm::begin(); ?>

        <div class="box-body">

        <?= $form->field($model, 'fecha_desde',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ]) ?>

        <?= $form->field($model, 'fecha_hasta',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ]) ?>

        <?php
        $lista=[
            'EXAMEN'=>'EXAMEN',
            'CURSADA'=>'CURSADA',
            //'PREINSCRIPCION'=> 'PREINSCRIPCION',       
        ];
        echo $form->field($model, 'tipo_inscripcion')->dropDownList($lista,['prompt'=>'Seleccione una opción','id'=>'tipo']); ?>
        
        <?= $form->field($model, 'turno_examen_id')->dropDownList(TurnoExamen::getListaTurnos(),['prompt'=>'Seleccione turno de examen']) ?> 

        <?= $form->field($model, 'actividad')->textarea(['rows' => 6]) ?>  

        <?= $form->field($model, 'fecha_inicio_inscripcion',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ]) ?>

        <?= $form->field($model, 'fecha_fin_inscripcion',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ]) ?>    
            
        </div>  
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>   
        <?php ActiveForm::end(); ?>
    </div>
    
</div>

<?php
$script= <<< JS
    
    var op= $("#tipo option:selected").text();
    
    if (op!='EXAMEN') {
        $('.field-calendarioacademico-turno_examen_id').addClass("ocultar"); 
    }else{
        $('.field-calendarioacademico-turno_examen_id').removeClass("ocultar"); 
    }


    $("#tipo").change(function(){
        
        var valor = $(this).val();  
                
                if (valor!='EXAMEN') {                    
                 $('.field-calendarioacademico-turno_examen_id').addClass("ocultar");                
                 
                }else{
                 $('.field-calendarioacademico-turno_examen_id').removeClass("ocultar"); 
                                 
                }

    });
   
    
  
JS;
$this->registerJS($script);
?>
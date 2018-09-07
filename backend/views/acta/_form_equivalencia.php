<?php

use yii\helpers\Html;
use backend\models\Materia;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */
/* @var $form yii\widgets\ActiveForm */

?>

        <div class="box">
            
            <?php $form = ActiveForm::begin([
                        'method' => 'post',
                        ]); ?>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">  
                        <?= $form->field($model, 'resolucion')->textInput() ?>
                    </div>
                    
                    <div class="col-md-12">
                        <?=$form->field($model, 'fecha_examen',[
                                            'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                        ])->widget( MaskedInput::className(), [    
                                                        'clientOptions' => ['alias' =>  'date']
                            ])->label('Fecha')?>
                    </div>
                    <div class="col-md-12">
                    <?= $form->field($model, 'materia_id')->widget(Select2::classname(), [
                            
                            'data' => Materia::getListaMateriasPorCarrera($inscripcion->carrera_id),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Mostrar todos'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                            ])

                    ?>
                    </div>
                    <div class="col-md-12">
                    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6,'placeholder' => "Detalle de la materia y carrera equivalente"]) ?>
                    </div>
                    <div class="col-md-12">
                    <?= $form->field($model, 'tipo_equivalencia')->dropDownList(['parcial'=>'PARCIAL','total'=>'TOTAL'], ['prompt'=>'Seleccione tipo de equivalencia']) ?>
                    </div>
                    <div class="col-md-12">
                    <?= $form->field($model, 'nota')->textInput() ?>
                    </div>

                    
                
            
                </div>
            </div>
            <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success']) ?>
            </div>
            
        
            <?php ActiveForm::end(); ?>
        </div>
       
    



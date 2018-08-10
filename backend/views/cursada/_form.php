<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;
use backend\models\Materia;
use backend\models\Condicion;
use backend\models\Alumno;
/* @var $this yii\web\View */
/* @var $model backend\models\Cursada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursada-form">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Datos</h3>
        </div>

        <?php $form = ActiveForm::begin(); ?>
        <div class="box-body">
            <?= $form->field($model, 'fecha_inscripcion',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                    ])->widget( MaskedInput::className(), [    
                                                    'clientOptions' => ['alias' =>  'date']
                        ]) ?>         

            <?= $form->field($model, 'materia_id')->widget(Select2::classname(), [
                        
                                                        'data' => Materia::getListaMaterias(),
                                                        'language' => 'es',
                                                        'options' => ['placeholder' => 'Buscar materia'],
                                                        'pluginOptions' => [
                                                            'allowClear' => true
                                                        ],
                                                        ]) ?>
        
        </div>  
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>   
        <?php ActiveForm::end(); ?>
    </div>
</div>

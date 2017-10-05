<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Correlatividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correlatividad-form">

    <?php $form = ActiveForm::begin(['options' => ['id'=>'materia-correlativa','data-pjax' => true ]]); ?>
   
    <?= $form->field($model, 'materia_id_correlativa')->widget(Select2::classname(), [                                            
                                            'data' => $listado_materias,
                                            'language' => 'es',
                                            'options' => ['placeholder' => 'Seleccione materia'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                            ])->label('* Materia') ?>

    <?= $form->field($model, 'tipo')->dropDownList(['a'=>'APROBADO','r'=>'REGULAR'],['prompt'=>'Seleccione una opción'])->label('* Condición') ?>

    <div class="form-group" id="submit-control">
    <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

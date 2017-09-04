<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Titulo;
/* @var $this yii\web\View */
/* @var $model backend\models\TituloDocente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titulo-docente-form">

    <?php $form = ActiveForm::begin(['options' => ['id'=>'titulo-docente','data-pjax' => true ]]); ?>  
    
    <?= $form->field($model, 'titulo_id')->widget(Select2::classname(), [                    
        'data' => Titulo::getListaTitulos(),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione titulo'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])

?> 
    <div class="form-group">
    <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

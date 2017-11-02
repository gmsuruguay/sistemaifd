<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InscripcionExamen */
/* @var $form ActiveForm */
$this->title="Inscripción a examen";
?>
<div class="alumno-form-inscripcion">
    <h3><?=$this->title?></h3>
    <?php $form = ActiveForm::begin(['class'=>'col s12 m12']); ?>

        <div class="row">
            <?= $form->field($model, 'materia_id',['options'=>['class'=>'input-field col m12']])->begin() ?>
                <?= Html::activeDropDownList($model,'materia_id',$materias, ['prompt'=>'Seleccione materia']) ?>
                <label for="">Materia</label>
                <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
            <?= $form->field($model,'origin')->end() ?>
        </div>          
        
        <div class="row">
            
            <?= $form->field($model, 'condicion_id',['options'=>['class'=>'input-field col m12']])->begin() ?>
                <?= Html::activeDropDownList($model,'condicion_id',$model->listaCondicion, ['prompt'=>'Seleccione condición']) ?>
                <label for="">Condición</label>
                <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
            <?= $form->field($model,'origin')->end() ?>

            
        </div>   
    
        <div class="form-group">
        <?= Html::submitButton('<i class="material-icons left">create</i> REGISTRAR', ['class' => 'btn waves-effect waves-light']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- alumno-form-inscripcion -->


<?php
 $script = <<< JS

$('select').material_select();   

 
JS;
$this->registerJs($script);
?>
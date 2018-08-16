<?php

use yii\helpers\Html;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */
$this->title = 'Solicitud de constancias';
?>
<div class="carrera-view">   
<h4><?= Html::encode($this->title) ?></h4>
            
             <?php $form = ActiveForm::begin([
                'method' => 'post',
                'class'=>'col s12 m12'
                ]); ?>
                <div class="row">
                    <?php
                    $datos= ArrayHelper::map($inscripcion, 'carrera.id', 'carrera.descripcion');
                    echo $form->field($model, 'carrera_id',['options'=>['class'=>'input-field col m12 s12']])->dropDownList($datos, ['prompt'=>'Seleccione Carrera'])->label(false); 
                
                ?>
                </div>
                <div class="row">
                    <?php
                    $datos= array('c'=>'CONSTANCIA DE ALUMNO REGULAR','a'=>'CERTIFICADO ANALITICO');
                    echo $form->field($model, 'tipo',['options'=>['class'=>'input-field col m12 s12']])->dropDownList($datos, ['prompt'=>'Seleccione Tipo de Constancia'])->label(false); 
                
                ?>    
                </div>
                <div class="row">
                    <?= $form->field($model, 'cantidad',['options'=>['class'=>'input-field col m12 s12']])->begin() ?>                        
                        <?= Html::activeInput('number',$model,'cantidad',['min'=>1, 'max'=>2, 'value'=>1]); ?>
                        <label for="alumno-telefono">Cantidad</label>
                        <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>
                </div>  

                <div class="row">
                    <?= $form->field($model, 'interesado',['options'=>['class'=>'input-field col m12 s12']])->begin() ?>                        
                        <?= Html::activeInput('text',$model,'interesado',['maxlength' => true,'placeholder'=>'A quien correponda']); ?>
                        <label for="alumno-telefono">Interesado</label>
                        <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>
                </div>      
               
                <div class="form-group margen-btn">
                <?= Html::submitButton('<i class="material-icons left">send</i> ENVIAR', ['class' => 'btn waves-effect waves-light']) ?>
                </div>
            <?php ActiveForm::end(); ?> 

</div>


<?php
 $script = <<< JS

$('select').material_select();   

 
JS;
$this->registerJs($script);
?>
<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;
use backend\models\Localidad;
use backend\models\Titulo;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use backend\models\Sede;
/* @var $this yii\web\View */
/* @var $model backend\models\Docente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-form">

    <div class="box ">
        <div class="box-header with-border">            
            <h3 class="box-title">Datos Docente</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="box-body">
         <div class="row">
            <div class="col-md-3">  
            <?= $form->field($model, 'nro_legajo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">
            <?php
                        $listData=['dni'=>'DNI',
                                    'du'=>'DU',
                                    'pas'=>'PAS',
                                    'ci'=>'CI',
                                    'lc'=>'LC',
                                    'le'=>'LE'
                        ];
                            echo $form->field($model, 'tipo_doc')->dropDownList($listData, ['options'=>['dni'=>['Selected'=>true]]]);
                ?>
            </div>
            <div class="col-md-3">
            <?= $form->field($model, 'numero')->widget( MaskedInput::className(), [                           
                        'mask' => '9',
                        'clientOptions' => ['repeat' => 8, 'greedy' => false]
                ])->label('* Numero') ?>
            </div>
            <div class="col-md-3">  
            <?= $form->field($model, 'cuil')->widget( MaskedInput::className(), [                      
                        
                        'clientOptions' => ['alias' =>  '99-9']
                ]) ?>
            </div>
            
         </div>
         <div class="row">
            <div class="col-md-6">  
            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true])->label('* Apellido') ?>
            </div>
            <div class="col-md-6">  
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('* Nombre') ?>
            </div>          
            
         </div>
         <div class="row">
         <div class="col-md-2">
         <?= $form->field($model, 'sexo')->dropDownList(['F'=>'FEMENINO','M'=>'MASCULINO'],['prompt'=>'Sexo']); ?>
         </div>
         <div class="col-md-2">
         <?php
         $lista=[
            'SOLTERO'=>'SOLTERO',
            'CASADO'=>'CASADO',
            'DIVORCIADO'=>'DIVORCIADO',
            'VIUDO'=>'VIUDO'            
        ]; ?>
         <?= $form->field($model, 'estado_civil')->dropDownList($lista,['prompt'=>'estado civil']); ?>
         </div>
         <div class="col-md-2">
            <?= $form->field($model, 'nacionalidad')->textInput(['maxlength' => true, 'value'=>'ARGENTINA']) ?>
            </div> 
         
         <div class="col-md-2">
            <?= $form->field($model, 'fecha_nacimiento',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ])->label('* Fecha Nacimiento') ?>
            </div>
            <div class="col-md-4">
            <label class="control-label"><?=Html::button('Lugar Nacimiento', ['value'=>Url::to(['localidad/nuevo']),'class' => 'btn-link btnmodal','id'=>'btnLugar'])?></label>
            <?php Pjax::begin(['id'=>'select-lugar']); ?>  
            <?= $form->field($model, 'lugar_nacimiento_id')->widget(Select2::classname(), [
                            
                                                            'data' => Localidad::getlistaLocalidades(),
                                                            'language' => 'es',
                                                            'options' => ['placeholder' => 'Seleccione lugar de nacimiento'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                            ])->label(false);

                                        ?> <?php Pjax::end(); ?>
            </div>            
         </div>
         <div class="row">
            <div class="col-md-4">
             <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
            <?= $form->field($model, 'nro')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
            <label class="control-label"><?=Html::button('Localidad', ['value'=>Url::to(['localidad/nuevo']),'class' => 'btn-link btnmodal' ,'id'=>'btnLocalidad'])?></label>
            <?php Pjax::begin(['id'=>'select-localidad']); ?> 
            <?= $form->field($model, 'localidad_id')->widget(Select2::classname(), [
                            
                                                            'data' => Localidad::getlistaLocalidades(),
                                                            'language' => 'es',
                                                            'options' => ['placeholder' => 'Seleccione localidad'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                            ])->label(false)

                                        ?> <?php Pjax::end(); ?>
            </div>
         </div>   
         <div class="row">
            <div class="col-md-4">
            <?= $form->field($model, 'telefono',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone-alt"></i>']]
                            ])->widget( MaskedInput::className(), [                           
                            'mask' => '9',
                            'clientOptions' => ['repeat' => 15, 'greedy' => false]
                        ]) ?>
            </div>
            <div class="col-md-2">
            <?= $form->field($model, 'celular',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
                            ])->widget( MaskedInput::className(), [                           
                            'mask' => '9',
                            'clientOptions' => ['repeat' => 15, 'greedy' => false]
                        ]) ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'email',[
                                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']]
                                            ])->textInput(['placeholder'=>"Correo electrónico"])?>
            </div>
         </div>       
               
         <?= $form->field($model, 'sede_id')->dropDownList(Sede::getListaSedes(),['prompt'=>'Seleccione el lugar de residencia del legajo']); ?>
        </div>                              
        <div class="box-footer">
                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
       
        </div>
        <?php ActiveForm::end(); ?>
    </div>       

</div>


<?php 
      Modal::begin([
        'header' => '<h3 class="text-center modal-title">Localidad</h3>',
        'class'=>'modal',
        'size'=>'modal-md', 
        'clientOptions' => ['backdrop' => 'static'],  
         ]);

        echo "<div class='modalContent'></div>";
        
      Modal::end();

?>
<?php
 $script = <<< JS
 var  id;

 $('.btnmodal').click(function(){
    if($(this).attr('id') == 'btnLugar'){
        id='lugar';
    }else{
        id='localidad';
    }
	$('.modal').modal('show')
	.find('.modalContent')
	.load($(this).attr('value'));
});

 $('body').on('beforeSubmit','form#localidad' , function(e){    
        if(id=='lugar'){
            select($(this),refrescarSelectLugar);
        } else{
            select($(this),refrescarSelectLocalidad);
        }            
        return false;
    });         
   
    
JS;
$this->registerJs($script);
?>
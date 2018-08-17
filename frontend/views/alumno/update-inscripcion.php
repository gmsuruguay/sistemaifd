<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;
use backend\models\Localidad;
use backend\models\TituloSecundario;
use backend\models\ColegioSecundario;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */
/* @var $form yii\widgets\ActiveForm */
$this->title="Datos del Alumno";
?>

<div class="update-form">    
<h4><?= Html::encode($this->title) ?></h4>
    <div class="container">
      <div class="row">
            <div class="col m10 s12 offset-m1">
            <div class="card-panel">
            
            <?php $form = ActiveForm::begin(['class'=>'col s12 m12']); ?>

                
                <h5><i class="material-icons prefix">person</i> Datos Personales</h5>
                
                <div class="row">
                    <?= $form->field($model, 'apellido',['options'=>['class'=>'input-field col m6 s12']])->begin() ?>
                        
                        <?= Html::activeInput('text',$model,'apellido'); ?>
                        <label for="signupform-apellido">Apellido</label>
                        <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>

                    <?= $form->field($model, 'nombre',['options'=>['class'=>'input-field col m6 s12']])->begin() ?>
                    <?= Html::activeInput('text',$model,'nombre'); ?>
                    <label for="signupform-nombre">Nombre</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>  
                </div>
                <div class="row">
                    <?php
                        $datos=['dni'=>'DNI',
                            'du'=>'DU',
                            'pas'=>'PAS',
                            'ci'=>'CI',
                            'lc'=>'LC',
                            'le'=>'LE'
                        ];
                        echo $form->field($model, 'tipo_doc',['options'=>['class'=>'input-field col m6 s12']])->dropDownList($datos, ['prompt'=>'Tipo de Documento'])->label(false); 
                        
                        ?>
                        <?= $form->field($model, 'numero',['options'=>['class'=>'input-field col m6 s12']])->begin() ?>
                        <?= Html::activeInput('number',$model,'numero',['min'=>1, 'disabled' => 'true']); ?>
                        <label for="signupform-numero">Número de documento</label>
                        <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                        <?= $form->field($model,'origin')->end() ?>  
                </div>
                <div class="row">
                    <?= $form->field($model, 'cuil',['options'=>['class'=>'input-field col m6 s12']])->begin() ?>                  
                    <?=
                    MaskedInput::widget([
                        'model' => $model,               
                        'name' => 'Alumno[cuil]',
                        'mask' => '99-9',                
                        'options' => ['placeholder' => 'Ejemplo 20-3']                 
                    
                    ]);
                    ?>  
                    <label for="signupform-cuil">CUIL</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>   

                    <?= $form->field($model, 'sexo',['options'=>['class'=>'input-field col m6 s12']])->dropDownList(['F'=>'FEMENINO','M'=>'MASCULINO'], ['prompt'=>'Sexo'])->label(false); ?>

                </div>
                <div class="row">
                <?php
                $lista=[
                    'SOLTERO'=>'SOLTERO',
                    'CASADO'=>'CASADO',
                    'DIVORCIADO'=>'DIVORCIADO',
                    'VIUDO'=>'VIUDO'            
                ]; ?>
                <?= $form->field($model, 'estado_civil',['options'=>['class'=>'input-field col m12 s12']])->dropDownList($lista,['prompt'=>'Estado civil'])->label(false); ?>
                </div>
                

                <div class="row">
                
                <?= $form->field($model, 'nacionalidad',['options'=>['class'=>'input-field col m6 s12']])->begin() ?>
                    <i class="material-icons prefix">public</i>
                    <?= Html::activeInput('text',$model,'nacionalidad'); ?>
                    <label for="signupform-nombre">Nacionalidad</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>  

                    <?= $form->field($model, 'fecha_nacimiento',['options'=>['class'=>'input-field col m6 s12']])->begin() ?>
                    <i class="material-icons prefix">today</i>
                    <?= MaskedInput::widget([   
                                'model' => $model,                 
                                'name'=>'Alumno[fecha_nacimiento]',
                                'clientOptions' => ['alias' =>  'date'], 
                                'options' => ['placeholder' => 'dd/mm/yyyy']                        
                        ]) ?>
                    <label for="alumno-fecha_nacimiento">Fecha de Nacimiento</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>    
                    
                </div>        

                <h5><i class="material-icons prefix">location_on</i> Datos de Contacto</h5>

                <div class="row">
                        <?= $form->field($model, 'domicilio',['options'=>['class'=>'input-field col m9 s12']])->begin() ?>
                            
                            <?= Html::activeInput('text',$model,'domicilio'); ?>
                            <label for="alumno-domicilio">Domicilio</label>
                            <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                        <?= $form->field($model,'origin')->end() ?>

                        <?= $form->field($model, 'nro',['options'=>['class'=>'input-field col m3 s12']])->begin() ?>
                            <?= Html::activeInput('text',$model,'nro'); ?>
                            <label for="alumno-nro">Nro</label>
                            <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                        <?= $form->field($model,'origin')->end() ?>             
                        
                        
                </div>  
                <div class="row">
                <?php
                $datos= Localidad::getListaLocalidades();
                echo $form->field($model, 'localidad_id',['options'=>['class'=>'input-field col m12 s12']])->dropDownList($datos, ['prompt'=>'Seleccione Localidad'])->label(false); 
                
                ?>
                </div> 
                <div class="row">
                        <?= $form->field($model, 'telefono',['options'=>['class'=>'input-field col m6 s12']])->begin() ?>
                            <i class="material-icons prefix">phone</i>
                            <?= Html::activeInput('text',$model,'telefono'); ?>
                            <label for="alumno-telefono">Telefono</label>
                            <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                        <?= $form->field($model,'origin')->end() ?>

                        <?= $form->field($model, 'celular',['options'=>['class'=>'input-field col m6 s12']])->begin() ?>
                            <i class="material-icons prefix">phone_android</i>
                            <?= Html::activeInput('text',$model,'celular'); ?>
                            <label for="alumno-celular">Celular</label>
                            <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                        <?= $form->field($model,'origin')->end() ?>

                    
                </div>  

                <div class="row">
                        <?= $form->field($model, 'email',['options'=>['class'=>'input-field col m12 s12']])->begin() ?>
                            <i class="material-icons prefix">email</i>
                            <?= Html::activeInput('email',$model,'email'); ?>
                            <label for="alumno-email">E-mail</label>
                            <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                        <?= $form->field($model,'origin')->end() ?>
                </div>  

                    
                
                
                    <div class="form-group">
                        <?= Html::submitButton('<i class="material-icons left">save</i> GUARDAR', ['class' => 'btn cyan waves-effect waves-light']) ?>    
                    </div>
                 
                <?php ActiveForm::end(); ?>

            
            
            
            </div>
            </div>
      </div>
    </div>
        


</div>


<?php
 $script = <<< JS

$('select').material_select();   

 
JS;
$this->registerJs($script);
?>
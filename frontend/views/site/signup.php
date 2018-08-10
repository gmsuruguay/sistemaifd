<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Crear nuevo usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h3 class="center-align"><?= Html::encode($this->title) ?></h3>    

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup', 
                'class'=>'col s12',
                'enableAjaxValidation' => true,
                'validationUrl' => Url::toRoute('site/validation'), 
                ]); ?>
                <h5>Datos del usuario</h5>
                <div class="row">
                <?= $form->field($model, 'email',['options'=>['class'=>'input-field col s12']])->begin() ?>
                    <?= Html::activeInput('text',$model,'email'); ?>
                    <label for="signupform-email">Email</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>                                     
                </div>   
                <div class="row">
                <?= $form->field($model, 'password',['options'=>['class'=>'input-field col s6']])->begin() ?>
                    <?= Html::activeInput('password',$model,'password'); ?>
                    <label for="signupform-password">Contraseña</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>

                <?= $form->field($model, 'retypePassword',['options'=>['class'=>'input-field col s6']])->passwordInput()->begin() ?>
                    <?= Html::activeInput('password',$model,'retypePassword'); ?>
                    <label for="signupform-retypepassword">Confirmar contraseña</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>   
                </div>
                <h5>Datos personales</h5>
                <div class="row">
                    <?= $form->field($model, 'apellido',['options'=>['class'=>'input-field col s6']])->begin() ?>
                        <?= Html::activeInput('text',$model,'apellido'); ?>
                        <label for="signupform-apellido">Apellido</label>
                        <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>

                    <?= $form->field($model, 'nombre',['options'=>['class'=>'input-field col s6']])->begin() ?>
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
                    echo $form->field($model, 'tipo_doc',['options'=>['class'=>'input-field col s6']])->dropDownList($datos, ['prompt'=>'Tipo de Documento'])->label(false); 
                    
                    ?>
                    <?= $form->field($model, 'numero',['options'=>['class'=>'input-field col s6']])->begin() ?>
                    <?= Html::activeInput('number',$model,'numero',['min'=>1]); ?>
                    <label for="signupform-numero">Número de documento</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>  
                </div> 

                 

                <div class="form-group">
                    <?= Html::submitButton('Generar usuario', ['class' => 'btn waves-effect waves-light', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


<?php
 $script = <<< JS

$('select').material_select();   

 
JS;
$this->registerJs($script);
?>
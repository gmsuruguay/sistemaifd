<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ChangePassword */

$this->title = Yii::t('app', 'Configuración');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    

<h4>Cambiar Contraseña</h4>

    <div class="row">        
        <div class="col m6 s12">
            <div class="box ">               
                <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                <div class="row">
                    <?= $form->field($model, 'oldPassword',['options'=>['class'=>'input-field col m12 s12']])->passwordInput()->begin() ?>
                    <?= Html::activeInput('password',$model,'oldPassword'); ?>
                    <label for="changepassword-oldpassword">Password actual</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>
                </div> 
                <div class="row">
                    <?= $form->field($model, 'newPassword',['options'=>['class'=>'input-field col m12 s12']])->passwordInput()->begin() ?>
                    <?= Html::activeInput('password',$model,'newPassword'); ?>
                    <label for="changepassword-newpassword">Password nuevo</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>
                    
                </div> 
                <p class="help-block">La contraseña debe contener como minimo 6 caracteres, y se recomienda que sea una combinación de letras y números</p>
                <div class="row">
                    <?= $form->field($model, 'retypePassword',['options'=>['class'=>'input-field col m12 s12']])->passwordInput()->begin() ?>
                    <?= Html::activeInput('password',$model,'retypePassword'); ?>
                    <label for="changepassword-retypepassword">Confirmar password</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                    <?= $form->field($model,'origin')->end() ?>                    
                </div>                     
                   
                <div class="box-footer">
                <?= Html::submitButton('<i class="material-icons left">save</i> GUARDAR', ['class' => 'btn waves-effect waves-light']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div> 
        </div>
    </div>
</div>

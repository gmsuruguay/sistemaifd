<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Recuperar contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
    <div  class="center-align">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>Por favor ingrese una nueva contraseña.</p>
    </div>

    <div class="row">
        <div class="col m6 offset-m3">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
            <div class='row'>
            <?= $form->field($model, 'password',['options'=>['class'=>'input-field col s12']])->begin() ?>
            <?= Html::activeInput('password',$model,'password'); ?>
            <label for="resetpasswordform-password">Contraseña</label>
            <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
            <?= $form->field($model,'origin')->end() ?>
            </div>
            
            <div class='row'>
            <?= $form->field($model, 'password_repeat',['options'=>['class'=>'input-field col s12']])->begin() ?>
            <?= Html::activeInput('password',$model,'password_repeat'); ?>
            <label for="resetpasswordform-password_repeat">Repetir contraseña</label>
            <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
            <?= $form->field($model,'origin')->end() ?>
            </div>
        

            <div class="center-align">
            <?= Html::submitButton('ENVIAR <i class="material-icons right">send</i>', ['class' => 'btn waves-effect waves-light', 'name' => 'login-button']) ?>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

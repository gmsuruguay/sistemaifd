<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Solicitud de recuperación de contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <div  class="center-align">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>Por favor complete el formulario. Recibira en su correo un enlace para restablecer su contraseña.</p>
    </div>
    

    <div class="row">
        <div class="col m6 offset-m3">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email',['options'=>['class'=>'input-field col s12']])->begin() ?>
                    <?= Html::activeInput('text',$model,'email',['autofocus' => true]); ?>
                    <label for="passwordresetrequestform-email">Email</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>

               

                <div class="center-align">
                <?= Html::submitButton('ENVIAR <i class="material-icons right">send</i>', ['class' => 'btn waves-effect waves-light', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

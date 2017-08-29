<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\PasswordResetRequest */

$this->title = 'Recuperación de Contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
   
    <div class="row">
        <div class="text-center">
             <h1><?= Html::encode($this->title) ?></h1>
             <p>Por favor, complete su correo electrónico. Se enviará un enlace para restablecer la contraseña.</p>
        </div>
        <div class="col-md-4 col-xs-8 col-md-offset-4 col-xs-offset-2">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <?= $form->field($model, 'email') ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Send'), ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ResetPassword */

$this->title = 'Contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">   

    <div class="row">
        <div class="text-center">
         <h1><?= Html::encode($this->title) ?></h1>
         <p>Elige una contraseña segura y no la vuelvas a utilizar en otras cuentas.</p>
         <p>Usa al menos 8 caracteres. No uses una contraseña de otro sitio ni algo demasiado obvio, como el nombre de tu mascota, hijo, etc.</p>
        </div>
        <div class="col-md-4 col-xs-8 col-md-offset-4 col-xs-offset-2">
        
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Nueva Contraseña') ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Cambiar Contraseña'), ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

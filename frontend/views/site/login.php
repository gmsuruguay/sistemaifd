<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Bienvenido a SURI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login ">
    

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="box-login">
            <div class="box-body">
                <h3 class="text-center">Iniciar Sesión</h3>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Usuario') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
               

                <div style="color:#999;margin:1em 0">
                     <?= Html::a('¿Olvidaste tu contraseña?', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-info', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
          </div>
            
        </div>
    </div>
</div>

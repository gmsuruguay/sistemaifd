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
        <div class="col m6 s12 offset-m3">
          <div class="box-login">           

            <div class="row">
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class'=>'col s12']); ?>
                <div class="row">
                <?= $form->field($model, 'username',['options'=>['class'=>'input-field col s12']])->begin() ?>
                    <i class="material-icons prefix">person</i>
                    <?= Html::activeInput('text',$model,'username'); ?>
                    <label for="loginform-username">Usuario</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>
                </div>

                <div class="row">
                <?= $form->field($model, 'password',['options'=>['class'=>'input-field col s12']])->begin() ?>
                    <i class="material-icons prefix">https</i>
                    <?= Html::activeInput('password',$model,'password'); ?>
                    <label for="loginform-username">Contraseña</label>
                    <?= Html::error($model,'origin',['class'=>'help-block help-block-error red-text text-darken-2']) ?>
                <?= $form->field($model,'origin')->end() ?>
                </div>               

                <div class="center-align">
                    <?= Html::submitButton('INICIAR SESIÓN <i class="material-icons right">send</i>', ['class' => 'btn waves-effect waves-light', 'name' => 'login-button']) ?>
                    <div style="color:#999;margin:1em 0">
                    <!--Si olvidaste tu contraseña recupérala haciendo click --><?//Html::a('aqui', ['site/request-password-reset']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>        
            
          </div>
            
        </div>
    </div>
</div>

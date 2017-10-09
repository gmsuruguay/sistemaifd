<?php
use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = Yii::t('rbac-admin', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
        <div class="site-login">    
            <div class="login-box">
        <div class="login-logo">
        <img src="img/logo_ifd_header.png" class="img-responsive center-block"  alt="Logo"/>
            <!--<p><b>SURI </b></p>    
            <h3>SISTEMA ÚNICO DE REGISTRO INSTITUCIONAL</h3>  -->     
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"><?= Html::encode($this->title) ?></p>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username',[
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'user',
                        'success' => 'check-circle',
                        'error' => 'exclamation-circle',
                    ]
                ])->label('Usuario') ?>
                <?= $form->field($model, 'password', [
                    'feedbackIcon' => [
                        'prefix' => 'fa fa-',
                        'default' => 'lock',
                        'success' => 'check-circle',
                        'error' => 'exclamation-circle',                        
                    ]
                ])->passwordInput()->label('Contraseña') ?>               
                
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Ingresar'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>             

        </div>
        <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
    
</div>

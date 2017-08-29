<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ChangePassword */

$this->title = Yii::t('rbac-admin', 'Change Password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    

   

    <div class="row">        
        <div class="col-lg-4 col-lg-offset-4">
            <div class="box ">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Datos Contraseña</h3>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                <div class="box-body">
                    <?= $form->field($model, 'oldPassword')->passwordInput()->label('Contraseña actual') ?>
                    <?= $form->field($model, 'newPassword')->passwordInput()->label('Nueva Contraseña') ?>
                    <?= $form->field($model, 'retypePassword')->passwordInput()->label('Repetir Contraseña') ?>
                    
                </div> 
                <div class="box-footer">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Actualizar'), ['class' => 'btn btn-primary btn-block', 'name' => 'change-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div> 
        </div>
    </div>
</div>

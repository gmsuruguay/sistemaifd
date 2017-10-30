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
    

<h3><?= Html::encode($this->title) ?></h3>

    <div class="row">        
        <div class="col m6 offset-m3">
            <div class="box ">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>
                    <h5 class="box-title">Cambiar Contraseña</h5>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                <div class="box-body">
                    <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                    <?= $form->field($model, 'newPassword')->passwordInput() ?>
                    <p class="help-block">La contraseña debe contener como minimo 6 caracteres, y se recomienda que sea una combinación de letras y números</p>
                    <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                    
                </div> 
                <div class="box-footer">
                <?= Html::submitButton('<i class="material-icons left">save</i> GUARDAR', ['class' => 'btn waves-effect waves-light']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div> 
        </div>
    </div>
</div>

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
    

<h1><?= Html::encode($this->title) ?></h1>

    <div class="row">        
        <div class="col-lg-6 col-lg-offset-3">
            <div class="box ">
                <div class="box-header with-border">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">Cambiar Contraseña</h3>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                <div class="box-body">
                    <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                    <?= $form->field($model, 'newPassword')->passwordInput() ?>
                    <p class="help-block">La contraseña debe contener como minimo 6 caracteres, y se recomienda que sea una combinación de letras y números</p>
                    <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                    
                </div> 
                <div class="box-footer">
                    <?= Html::submitButton(Yii::t('app', 'Actualizar'), ['class' => 'btn btn-primary btn-block', 'name' => 'change-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div> 
        </div>
    </div>
</div>

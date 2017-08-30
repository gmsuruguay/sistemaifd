<?php
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use backend\models\TipoUsuario;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
        
    
            
                
                    <div class="box box-info">
                        <div class="box-header with-border">
                           <h3 class="box-title">Formulario de registro</h3>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <div class="box-body">
                            
                            <h4>Datos de usuario</h4> 
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'username',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-user"></i>']]
                                    ])->textInput(['placeholder'=>"Nombre de usuario"]) ?>
                                    <p class="help-block">El nombre de usuario puede contener sólo letras y numeros</p>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'password',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-lock"></i>']]
                                    ])->passwordInput(['placeholder'=>"Contraseña"]) ?>
                                    <p class="help-block">La contraseña debe contener como minimo 6 letras</p>
                                </div>
                            </div>

                                <?= $form->field($model, 'email',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']]
                                    ])->textInput(['placeholder'=>"Correo electrónico"]) ?>
                           
                            <h4>Datos de Perfil</h4> 

                            <?php
                            $listData=['admin'=>'Personal Administrativo','medico'=>'Profesional Medico'];
                            echo $form->field($perfil, 'tipo_usuario',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-user"></i>']]
                                    ])->dropDownList($listData, 
						        ['prompt'=>'Seleccione tipo']);
                            ?>

                            <div class="row">
                                <div class="col-md-6">
                                  <?= $form->field($perfil, 'nombre')->textInput() ?>
                                </div>
                                <div class="col-md-6">
                                 <?= $form->field($perfil, 'apellido')->textInput() ?>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3">
                                  <?= $form->field($perfil, 'domicilio')->textInput() ?>
                                </div>
                                <div class="col-md-3">
                                  <?= $form->field($perfil, 'numero')->textInput() ?>
                                </div>
                                <div class="col-md-3">
                                  <?= $form->field($perfil, 'piso')->textInput() ?>
                                </div>
                                <div class="col-md-3">
                                  <?= $form->field($perfil, 'dpto')->textInput() ?>
                                </div>
                            </div>  
                            
                            <div class="row">
                                <div class="col-md-6">
                                 <?= $form->field($perfil, 'telefono',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone-alt"></i>']]
                                    ])->widget( MaskedInput::className(), [                           
                                    'mask' => '9',
                                    'clientOptions' => ['repeat' => 15, 'greedy' => false]
                                ]) ?>
                                </div>
                                <div class="col-md-6">
                                 <?= $form->field($perfil, 'celular',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
                                    ])->widget( MaskedInput::className(), [                           
                                    'mask' => '9',
                                    'clientOptions' => ['repeat' => 15, 'greedy' => false]
                                ]) ?>
                                </div>
                            </div>  

                           

                            

                            

                            <div class="box-footer">
                                <?= Html::submitButton(Yii::t('rbac-admin', '<i class="fa fa-save"> </i> Guardar'), ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                            </div>
                        </div>    
                        
                        <?php ActiveForm::end(); ?>
                    </div>
                
            
   
</div>

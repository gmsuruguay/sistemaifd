<?php

use yii\helpers\Html;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use backend\models\TipoUsuario;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

     <div class="box box-info">
                        <div class="box-header with-border">
                           <i class="fa fa-file"></i>
                           <h3 class="box-title">Datos usuario</h3>
                        </div>
                        <?php $form = ActiveForm::begin(); ?>

                        <div class="box-body">
                            
                            <h4>Datos de sistema</h4> 
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'username',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-user"></i>']]
                                    ])->textInput(['placeholder'=>"Nombre de usuario"])->label('* Username') ?>
                                    <p class="help-block">El nombre de usuario puede contener sólo letras y numeros</p>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'password',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-lock"></i>']]
                                    ])->passwordInput(['placeholder'=>"Contraseña"])->label('* Password') ?>
                                    <p class="help-block">La contraseña debe contener como minimo 6 letras</p>
                                </div>
                            </div>

                                <?= $form->field($model, 'email',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']]
                                    ])->textInput(['placeholder'=>"Correo electrónico"])->label('* Email') ?>
                           
                            <h4>Datos de Perfil</h4> 

                            <?php
                            $listData=TipoUsuario::getListaTipo();
                            echo $form->field($model, 'tipo_usuario_id',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-user"></i>']]
                                    ])->dropDownList($listData, 
						        ['prompt'=>'Seleccione tipo'])->label('* Tipo usuario');
                            ?>

                            <div class="row">
                                <div class="col-md-6">
                                  <?= $form->field($perfil, 'nombre')->textInput()->label('* Nombre') ?>
                                </div>
                                <div class="col-md-6">
                                 <?= $form->field($perfil, 'apellido')->textInput()->label('* Apellido') ?>
                                </div>
                            </div> 


                            <div class="box-footer">
                                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                            </div>
                        </div>    
                        
                        <?php ActiveForm::end(); ?>
                    </div>

</div>

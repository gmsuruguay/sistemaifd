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
                                    ])->textInput(['placeholder'=>"Nombre de usuario", 'disabled' => 'disabled']) ?>
                                    <p class="help-block">El nombre de usuario puede contener sólo letras y numeros</p>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'email',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-envelope"></i>']]
                                    ])->textInput(['placeholder'=>"Correo electrónico"]) ?>
                                </div>
                            </div>

                               
                           
                            <h4>Datos de Perfil</h4> 

                            <?php
                            $listData=$model->listaRoles;
                            echo $form->field($role, 'item_name',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-user"></i>']]
                                    ])->dropDownList($listData, 
						        ['prompt'=>'Seleccione tipo'])->label('* Tipo usuario');
                            ?>

                            <div class="row">
                                <div class="col-md-6">
                                  <?= $form->field($perfil, 'nombre')->textInput() ?>
                                </div>
                                <div class="col-md-6">
                                 <?= $form->field($perfil, 'apellido')->textInput() ?>
                                </div>
                            </div> 


                            <div class="box-footer">
                                <?= Html::submitButton( '<i class="fa fa-save"> </i> Guardar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                            </div>
                        </div>    
                        
                        <?php ActiveForm::end(); ?>
                    </div>

</div>

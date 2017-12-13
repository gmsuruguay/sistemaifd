<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Carrera;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\search\MateriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materia-search">

    <div class="box">
            <div class="box-header with-border">                         
                <h3 class="box-title"><i class="fa fa-filter"></i> Criterios de búsqueda</h3>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>    
                
                <div class="row">
                    <div class="col-md-4">
                    <?= $form->field($model, 'descripcion')->textInput(['placeholder'=>'Nombre de la materia']) ?>
                    </div>
                    <div class="col-md-4">
                      <?= $form->field($model, 'carrera_id')->widget(Select2::classname(), [
                
                                                'data' => Carrera::getListaCarreras(),
                                                'language' => 'es',
                                                'options' => ['placeholder' => 'Mostrar todos'],
                                                'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                                ])

                            ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'estado')->checkbox() ?>
                    </div>                    
                    
                </div>  
                
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Buscar', ['class' => 'btn btn-primary']) ?>
                  
                </div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>

</div>

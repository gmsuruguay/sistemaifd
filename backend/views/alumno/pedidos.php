<?php

use yii\helpers\Html;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */
$this->title = 'Pedidos de constancias';
?>
<div class="carrera-view">   
    <h3>Datos</h3>
   
    <div class="row">
        <div class="col-sm-6 col-md-6">
            
             <?php $form = ActiveForm::begin([
                'method' => 'post',
                ]); ?>
                 <?= $form->field($model, 'carrera_id')->label('Carreras')->dropDownList(ArrayHelper::map($inscripcion, 'carrera.id', 'carrera.descripcion'), 
                                                                                            ['prompt'=>'--------------'])?>
                <?= $form->field($model, 'tipo')->label('Tipo de pedido')->dropDownList(['c'=>'CONSTANCIA DE ALUMNO REGULAR', 
                                                                                        'a'=>'CERTIFICADO ANALITICO'], 
                                                                                        ['prompt'=>'--------------'])?>
                <?= $form->field($model, 'cantidad')->textInput() ?>

                <div class="form-group pull-right">
                    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>



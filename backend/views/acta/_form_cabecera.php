<?php

use yii\helpers\Html;
use backend\models\Carrera;
use backend\models\Condicion;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\grid\GridView;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;


/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */
/* @var $form yii\widgets\ActiveForm */
$carreras = Carrera::find()->all();
$condicion = Condicion::find()->all();
?>

<div class="acta-form">

    <div class="box-header with-border">            
        <h3 class="box-title">Datos de Acta</h3>         
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'enableClientValidation'=> true,
                    'id'=> 'form-cabecera',
                    ]); ?>
        <div class="row">
            <div class="col-sm-4 col-md-4">  
                <?= $form->field($model, 'libro')->textInput() ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?= $form->field($model, 'folio')->textInput() ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?= $model->isNewRecord ? $form->field($model, 'fecha_examen',[
                                    'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                ])->widget( MaskedInput::className(), [    
                                                'clientOptions' => ['alias' =>  'date']
                    ]): $form->field($model, 'fecha_examen')->textInput(['value'=> date('d/m/Y',strtotime($model->fecha_examen))])?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <?= $form->field($model, 'condicion_id')->label('Condición')->dropDownList($model->listaCondicion, ['prompt'=>'-------------',]) ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?= Html::label('Carreras') ?>
                <?= Html::dropDownList('carrera', 
                                                $model->isNewRecord ? '': $model->materia->carrera->id,  
                                                ArrayHelper::map($carreras, 'id', 'descripcion'),
                                                [
                                                    'prompt'=>'-------------',
                                                    'class'=> 'form-control',
                                                    'onchange' => '$.get("'.Url::toRoute('acta/change-carrera').'",{carreraId: $(this).val()})
                                                                    .done(function(data)
                                                                    {
                                                                        $("select#calendarioexamen-materia_id").html(data);
                                                                    });'
                                                ]) 
                                                ?> 
            </div>
            <div class="col-sm-4 col-md-4">

                 <?= $model->isNewRecord ?$form->field($model, 'materia_id')->label('Materias')->dropDownList([], ['prompt'=>'--------------']) : 
                        $form->field($model, 'materia_id')->label('Materias')->dropDownList(ArrayHelper::map($materias, 'id', 'descripcion'))?>
            </div>
        </div>
        <div class="form-group pull-right">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?> 
        </div>
        
        <div class="help-block"></div>
        
        <?php ActiveForm::end(); ?>
    </div>

</div>

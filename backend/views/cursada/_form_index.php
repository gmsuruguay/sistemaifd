<?php

use yii\helpers\Html;
use backend\models\Carrera;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;


/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */
/* @var $form yii\widgets\ActiveForm */
$carreras = Carrera::find()->all();
?>

<div class="cursada-form">
    <?php $form = ActiveForm::begin([
                'method' => 'post',
                ]); ?>
    
        <div>
            <?= $model->isNewRecord ? $form->field($model, 'fecha_inscripcion',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ]): $form->field($model, 'fecha_inscripcion')->textInput(['value'=> date('d/m/Y',strtotime($model->fecha_inscripcion))])?>
        </div>

        <div>
            <?= $model->isNewRecord ? $form->field($model, 'fecha_cierre',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ]): $form->field($model, 'fecha_cierre')->textInput(['value'=> date('d/m/Y',strtotime($model->fecha_cierre))])?>
        </div>

        <div>
            <?= Html::label('Carreras') ?>
            <?= Html::dropDownList('carrera', 
                                            $model->isNewRecord ? '': $model->materia->carrera->id,  
                                            ArrayHelper::map($carreras, 'id', 'descripcion'),
                                            [
                                                'prompt'=>'-------------',
                                                'class'=> 'form-control',
                                                'onchange' => '$.post("'.Url::toRoute('materias').'",{carreraId: $(this).val()})
                                                                .done(function(data)
                                                                {
                                                                    $("select#cursada-materia_id").html(data);
                                                                });'
                                            ]) 
                                            ?> 
        </div>

        <div>

             <?= $model->isNewRecord ?$form->field($model, 'materia_id')->label('Materias')->dropDownList([], ['prompt'=>'--------------']) : 
                    $form->field($model, 'materia_id')->label('Materias')->dropDownList(ArrayHelper::map($materias, 'id', 'descripcion'))?>
        </div>

         <div>
            <?= $model->isNewRecord ? $form->field($model, 'fecha_vencimiento',[
                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                            ])->widget( MaskedInput::className(), [    
                                            'clientOptions' => ['alias' =>  'date']
                ]): $form->field($model, 'fecha_vencimiento')->textInput(['value'=> date('d/m/Y',strtotime($model->fecha_vencimiento))])?>
        </div>
        
        
        
       
    <div class="form-group pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Aceptar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= Html::input('hidden', 'ant_f_i', $model->fecha_inscripcion) ?>
    <?= Html::input('hidden', 'ant_f', $model->fecha_cierre) ?>
    <?= Html::input('hidden', 'ant_m_i', $model->materia_id) ?>
    <?= Html::input('hidden', 'ant_f_v', $model->fecha_vencimiento) ?>
    
    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use backend\models\Carrera;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model backend\models\MateriaAsignada */
/* @var $form yii\widgets\ActiveForm */
$carreras = Carrera::find()->all();
//$idCarrera= $model->materia->carrera->id;
?>

<div class="materia-asignada-form">

    <?php $form = ActiveForm::begin(/*[
                'method' => 'post',
                'action' => ['materia-asignada/create'],
                ]*/); ?>
    <div class="row">
        <div class="col-md-6">  
            <?= Html::label('Carreras') ?>
                    <?= Html::dropDownList('carrera', 
                                            $model->isNewRecord ? '': $model->materia->carrera->id, 
                                            Carrera::getListaCarreras(),
                                            [
                                                'prompt'=>'-------------',
                                                'class'=> 'form-control',
                                                'onchange' => '$.get("'.Url::toRoute('docente/change-carrera').'",{carreraId: $(this).val()})
                                                                .done(function(data)
                                                                {
                                                                    $("select#materiaasignada-materia_id").html(data);
                                                                });'
                                            ]) 
                                            ?> 
        </div>
        <div class="col-md-6"> 
            <?= Html::label('Materias') ?>
          <!--  <select id="materiaasignada-materia_id" class="form-control" name="MateriaAsignada[materia_id]" aria-required="true"></select>-->
             <?= $model->isNewRecord ?$form->field($model, 'materia_id')->label(false)->dropDownList([]) : 
                    $form->field($model, 'materia_id')->label(false)->dropDownList(ArrayHelper::map($materias, 'id', 'descripcion'))?>
        </div>
        <div class="col-md-6"> 
             <?= $model->isNewRecord ? $form->field($model, 'fecha_alta',[
                                    'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                ])->widget( MaskedInput::className(), [    
                                                'clientOptions' => ['alias' =>  'date']
                    ]): $form->field($model, 'fecha_alta',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                    ])->widget( MaskedInput::className(), [    
                                                    'clientOptions' => ['alias' =>  'date'], 
                        ])->textInput(['value'=> date('d/m/Y',strtotime($model->fecha_alta))])?>
        </div>
        <div class="col-md-6"> 
            <?= $model->isNewRecord ? $form->field($model, 'fecha_baja',[
                                    'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                ])->widget( MaskedInput::className(), [    
                                                'clientOptions' => ['alias' =>  'date']
                    ]): $form->field($model, 'fecha_baja',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                    ])->widget( MaskedInput::className(), [    
                                                    'clientOptions' => ['alias' =>  'date'], 
                        ])->textInput(['value'=> ($model->fecha_baja == '')?'':date('d/m/Y',strtotime($model->fecha_baja))])?>
        </div>
    </div>

	

    <?= $form->field($model, 'docente_id')->label(false)->hiddenInput(['value' => $model->isNewRecord ? $docente->id: $model->docente_id]); ?>


    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

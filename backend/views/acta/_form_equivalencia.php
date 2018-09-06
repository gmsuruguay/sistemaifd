<?php

use yii\helpers\Html;
use backend\models\Materia;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\grid\GridView;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */
/* @var $form yii\widgets\ActiveForm */
$this->title='Equivalencias';
?>

<div class="acta-form">

    <div class="box">
        <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title"><?=$inscripcion->nombreAlumno?></h3> 
                         
        </div>

        <div class="box-body">  
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [                
                
                [
                'label'=>'Carrera',
                'value'=>$inscripcion->descripcionCarrera,  
                ],
               
                
            ],
        ]) ?> 
        </div>
    </div> 
    <div class="box">
            
                <?php $form = ActiveForm::begin([
                            'method' => 'post',
                            ]); ?>
                    <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">  
                            <?= $form->field($model, 'resolucion')->textInput() ?>
                        </div>
                        
                        <div class="col-md-12">
                            <?=$form->field($model, 'fecha_examen',[
                                                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                            ])->widget( MaskedInput::className(), [    
                                                            'clientOptions' => ['alias' =>  'date']
                                ])->label('Fecha')?>
                        </div>
                        <div class="col-md-12">
                        <?= $form->field($model, 'materia_id')->widget(Select2::classname(), [
                                
                                'data' => Materia::getListaMateriasPorCarrera($inscripcion->carrera_id),
                                'language' => 'es',
                                'options' => ['placeholder' => 'Mostrar todos'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                ])

                        ?>
                        </div>
                        <div class="col-md-12">
                        <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
                        </div>
                        <div class="col-md-12">
                        <?= $form->field($model, 'tipo_equivalencia')->dropDownList(['parcial'=>'PARCIAL','total'=>'TOTAL'], ['prompt'=>'Seleccione tipo de equivalencia']) ?>
                        </div>
                        <div class="col-md-12">
                        <?= $form->field($model, 'nota')->textInput() ?>
                        </div>

                        
                    
                
                    </div>
                </div>
                <div class="box-footer">
                    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                
            
                <?php ActiveForm::end(); ?>
    </div>
</div>

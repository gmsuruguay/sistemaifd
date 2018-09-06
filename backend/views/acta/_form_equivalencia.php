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
use common\models\FechaHelper;

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
    
    <button class="btn btn-success " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
     <span  class="glyphicon glyphicon-random" aria-hidden="true"></span>  Registrar equivalencia
    </button>
    <div class="collapse" id="collapseExample">
        <div class="">
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
                    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6,'placeholder' => "Detalle de la materia y carrera equivalente"]) ?>
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
                <?= Html::submitButton($model->isNewRecord ?  '<i class="fa fa-save"> </i> Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            
        
            <?php ActiveForm::end(); ?>
        </div>
        </div>
    </div>

    

    <div class="box">
    <div class="box-header with-border">
            <h3 class="box-title">Listado de Materias</h3>
            
    </div>
    <div class="box-body">
    <?= GridView::widget([
            'dataProvider' => $materias,            
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'resolucion',
                [
                'attribute'=>'fecha_examen',
                'label'=>'Fecha',
                'format'=>'text',//raw, html
                'content'=>function ($data){
                    return FechaHelper::fechaDMY($data->fecha_examen);
                }
                ],
                [
                'attribute'=>'materia_id',
                'label'=>'Materia',
                'format'=>'text',//raw, html
                'content'=>function ($data){
                    return $data->descripcionMateria;
                }
                ],   
                'descripcion',
                'tipo_equivalencia',
                'nota'      
            ],
    ]); ?>
    </div>
    
    </div>
    

</div>

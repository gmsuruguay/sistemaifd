<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */

$this->title = 'Cursada de Alumnos';
$this->params['breadcrumbs'][] = ['label' => 'Cursada', 'url' => ['index-auto']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acta-examen-view">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Carga de Cursada</h3>
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-pencil"></i> Actualizar', ['update-auto', 
                                            'fecha_inscripcion' => $model->fecha_inscripcion, 
                                            'fecha_cierre' => $model->fecha_cierre,
                                            'materia_id'=> $model->materia_id ], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa  fa-trash"></i> Borrar', ['destroyed-all-auto', 
                                            'fecha_inscripcion' => $model->fecha_inscripcion, 
                                            'fecha_cierre' => $model->fecha_cierre,
                                            'materia_id'=>$model->materia_id], ['class' => 'btn btn-danger',
                                                                        'data' => [
                                                                                'confirm' => '¿Esta seguro de borrar el acta entera?',
                                                                                'method' => 'post',]]) ?>
            </div>            
        </div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label'=> 'Fecha de Inscripcion',
                        'value'=> function ($data){
                                return FechaHelper::fechaDMY($data->fecha_inscripcion);
                            }
                    ],
                    [
                        'label'=> 'Fecha',
                        'value'=> function ($data){
                                return FechaHelper::fechaDMY($data->fecha_cierre);
                            }
                    ],
                    [
                        'label'=> 'Materia',
                        'value'=> function ($data){
                                return $data->materia->descripcion;
                            }
                    ],
                    [
                        'label'=> 'Carrera',
                        'value'=> function ($data){
                                return $data->materia->carrera->descripcion;
                            }
                    ],
                ],
            ]) ?>
           
        </div>
        <div class="box-body">
            <?= $this->render('_form_load', [
                'model' => $model,
                'gridCursada'=>$gridCursada,
            ]) ?>
           
        </div>
    </div>   

</div>
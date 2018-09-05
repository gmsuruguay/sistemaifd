<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */

$this->title = 'Carga de calificaciones';
$this->params['breadcrumbs'][] = ['label' => 'Acta de Examen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acta-examen-view">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Acta de Exámen</h3>
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-pencil"></i> Actualizar', ['update', 
                                            'libro' => $model->libro, 
                                            'folio' => $model->folio ], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa  fa-trash"></i> Borrar', ['destroyed', 
                                            'libro' => $model->libro, 
                                            'folio' => $model->folio], ['class' => 'btn btn-danger',
                                                                        'data' => [
                                                                                'confirm' => '¿Esta seguro de borrar el acta entera?',
                                                                                'method' => 'post',]]) ?>
            </div>            
        </div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'libro',
                    'folio',
                    [
                        'label'=> 'Fecha de Examen',
                        'value'=> function ($data){
                                return FechaHelper::fechaDMY($data->fecha_examen);
                            }
                    ],
                    [
                        'label'=> 'Condicion',
                        'value'=> function ($data){
                                return $data->condicion->descripcion;
                            }
                    ],
                    [
                        'label'=> 'Materia',
                        'value'=> function ($data){
                                return $data->materia->descripcion;
                            }
                    ],
                        ],
            ]) ?>
           
        </div>
        <div class="box-body">
            <?= $this->render('_form_load', [
                'model' => $model,
                'grid_notas'=>$grid_notas,
            ]) ?>
           
        </div>
    </div>   

</div>
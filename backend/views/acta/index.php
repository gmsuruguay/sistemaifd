<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ActaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acta-index">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Listado de actas</h3>  
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Acta', ['create'], ['class' => 'btn btn-success']) ?>
            </div>           
        </div>
        <div class="box-body">
             <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'libro',
                    'folio',
                    'nro_permiso',
                    [
                        'attribute'=> 'alumno_id',
                        'label'=> 'Apellido y Nombre',
                        'value'=> function ($data){
                                    return $data->alumno->nombreCompleto;
                            }
                    ],
                    'nota',
                    'asistencia:boolean',
                    // 'condicion_id',
                    // 'alumno_id',
                    // 'materia_id',
                    // 'fecha_examen',
                    // 'resolucion',

                    ['class' => 'yii\grid\ActionColumn',
                    'template' => Helper::filterActionColumn('{delete}'),
                    'buttons' => [
                        'delete'=>function ($url, $model, $key) {
                                            
                            return Html::a('', ['/acta/delete-from-index', 'id'=>$model->id], ['class' => 'fa fa-trash', 'title'=>'Eliminar registro']);
                            
                        },
                    ]
                ],
            ]]); ?>
           
        </div>
    </div>
   
</div>

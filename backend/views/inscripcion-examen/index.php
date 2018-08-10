<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\FechaHelper;
use yii\helpers\Url;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionExamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permisos de Examen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-examen-index">
   
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Listado de Permisos de Examen</h3>  
                      
        </div>
        <div class="box-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,                
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',       
                    [
                    'attribute'=>'fecha_examen',
                    'value'=>function($data){
                        return FechaHelper::fechaDMY($data->fecha_examen);
                    }
                    ],
                    [
                    'attribute'=>'materia_id',
                    'value'=>function($data){
                        return $data->descripcionMateria;
                    }

                    ],      
                    [
                    'attribute'=>'alumno',                    
                    'format'=>'text',//raw, html
                    'content'=>function ($data){      
                        $url = Url::to(['alumno/view', 'id'=>$data->alumno_id]);
                        $opciones = [];
                        return Html::a($data->datoCompletoAlumno, $url, $opciones);             
                        
                    }
                    ], 
                    [
                        'attribute'=>'estado',                                       
                        'format'=>'raw',
                        'value'=>function($data){                   
        
                            switch ($data->estado) {
                                case 1: //Estado activo
                                    return Html::tag('span','Activo',['class'=> 'label label-success']);
                                    break;
                                case 0: //Estado pendiente
                                    return Html::tag('span','Pendiente',['class'=> 'label label-warning']);
                                    break;  
                                case 2: //Estado Anulado
                                    return Html::tag('span','Anulado',['class'=> 'label label-danger']);
                                    break;                                                                       
                            }       
                            
                        }
                        ],

                        ['class' => 'yii\grid\ActionColumn','template' => Helper::filterActionColumn('{view} {activar} {desactivar}'), 
                        'buttons' => [
                           'activar'=>function ($url, $model, $key) {
                                               
                                return Html::a('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ', ['activar','id'=>$key], 
                                ['title'=>'Activar',
                                    'data' => [
                                    'confirm' => 'Esta seguro de activar este registro ?',
                                    'method' => 'post',
                                ]
                                ]);  
                               
                           },
   
                           'desactivar' => function ($url, $model, $key) {
                               return Html::a('<span class="glyphicon glyphicon-off" aria-hidden="true"></span> ', ['desactivar','id'=>$key], 
                               ['title'=>'Desactivar',
                                   'data' => [
                                   'confirm' => 'Esta seguro de inactivar este registro ?',
                                   'method' => 'post',
                               ]
                               ]);                          
                            
                           },
                       ],
                       'visibleButtons' => [
                           
                           'activar' => function ($model, $key, $index) {
                               return ($model->estado == 0) ? true : false;
                           },
                           'desactivar' => function ($model, $key, $index) {
                                return ($model->estado == 1) ? true : false;
                           }
                       ]
                   ],
                ],
            ]); ?>
        </div>
    </div>
</div>

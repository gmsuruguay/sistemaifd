<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use common\models\FechaHelper;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Mis Inscripciones';

?>
<div class="inscripcion-view">

    <h3><?= Html::encode($this->title) ?></h3>   
        <div class="card-panel">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [                
                
                [
                'label'=>'Carrera',
                'value'=>$model->descripcionCarrera,  
                ],
                'nro_libreta',
                
            ],
        ]) ?> 

        </div>
        
    
        
        <div class="card">
            <div class="card-content">
              <h5 class="card-title"> Cursadas - Períodos lectivos vigentes </h5>
            </div>
            <div class="card-action">
           
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,  
                    'tableOptions' =>['class' => 'table bordered responsive-table'],                                         
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'], 
                        
                        [
                        'attribute'=>'fecha_inscripcion',                        
                        'format'=>'text',//raw, html
                        'content'=>function ($data){
                            return FechaHelper::fechaDMY($data->fecha_inscripcion);
                        }
                        ], 
                                                             
                        [
                        'attribute'=>'materia_id',                        
                        'format'=>'text',//raw, html
                        'content'=>function ($data){
                            return $data->descripcionMateria;
                        }
                        ],    
    
                    ],
            ]);?>
             </div>
        </div>

        <div class="card">
            <div class="card-content">
              <h5 class="card-title"> Exámenes - Períodos lectivos vigentes </h5>
            </div>
            <div class="card-action">
           
            <?= GridView::widget([
                    'dataProvider' => $dataProviderExamen,  
                    'tableOptions' =>['class' => 'table bordered responsive-table'],                                         
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'], 
                        
                        [
                        'attribute'=>'fecha_inscripcion',
                        'label'=>'Fecha Inscripción',
                        'format'=>'text',//raw, html
                        'content'=>function ($data){
                            return FechaHelper::fechaDMY($data->fecha_inscripcion);
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
                        [
                        'attribute'=>'fecha_examen',                        
                        'format'=>'text',//raw, html
                        'content'=>function ($data){
                            return FechaHelper::fechaDMY($data->fecha_examen);
                        }
                        ], 
                        [
                        'attribute'=>'estado',                                       
                        'format'=>'raw',
                        'value'=>function($data){                   
        
                            switch ($data->estado) {
                                case 1: //Estado activo
                                    return 'Activo';
                                    break;
                                case 0: //Estado pendiente
                                    return 'Pendiente';
                                    break;
                                case 2: //Estado pendiente
                                    return 'Anulado';
                                    break;                                                                       
                            }       
                            
                        }
                        ],
    
                        ['class' => 'yii\grid\ActionColumn', 'template' => '{imprimir-permiso} {baja-examen}', 
                        'buttons' => [
                            'imprimir-permiso' => function ($url, $model, $key) {
                                return Html::a('<i class="material-icons left">print</i>', ['imprimir-permiso', 'id' => $key], ['title'=>'Imprimir','target'=>'_blank']);
                            },
                            'baja-examen' => function ($url, $model, $key) {
                                return Html::a('<i class="material-icons left">highlight_off</i>', 
                                ['baja-examen', 'id' => $key],
                                [
                                'title'=>'Baja',
                                'data' => [
                                    'confirm' => 'Esta seguro de realizar la baja a esta mesa de exámen?',
                                    'method' => 'post',
                                ],
                                ]);
                            },
            
                        ]],    
    
                    ],
            ]);?>
             </div>
        </div>
       

</div>

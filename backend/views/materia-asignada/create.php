<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prof. '.$docente->nombreCompleto;

$this->params['breadcrumbs'][] = ['label' => 'Docente', 'url' => ['docente/index']];
$this->params['breadcrumbs'][] = 'Asignar Materias';

?>
<div class="materia-asignada-index">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Asignar Materias</h3>    
        </div>
         <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
                'docente'=> $docente,
            ]) ?>
        </div>
        <div class="box-header with-border">            
            <h3 class="box-title">Materias asignadas</h3>    
        </div>
         <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                    'label'=> 'Carrera',
                    'value'=> function ($data){
                        return $data->materia->descripcionCarrera;
                    }
                    ],
                    [
                    'label'=> 'Materia',
                    'value'=> function ($data){
                        return $data->descripcionMateria;
                    }
                    ],
                    [
                    'label'=> 'Fecha Alta',
                    'value'=> function ($data){
                        return date('d/m/Y',strtotime($data->fecha_alta));
                    }
                    ],
                    [
                    'label'=> 'Fecha Baja',
                    'value'=> function ($data){
                        return ($data->fecha_baja=='')?'------':date('d/m/Y',strtotime($data->fecha_baja));
                    }
                    ],
                    ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{update}{baja}'),
                    'buttons' => [
                        'baja' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ', ['baja','id'=>$key], 
                            ['title'=>'Dar de baja',
                                'data' => [
                                'confirm' => 'Esta seguro de dar de baja la asignación de la materia?',
                                'method' => 'post',
                            ]
                            ]);                          
                         
                        },

                    ],
                    'visibleButtons' => [
                        'update' => function ($model, $key, $index) {
                            return is_null($model->fecha_baja) ? true : false;
                         },
                        'baja' => function ($model, $key, $index) {
                        return is_null($model->fecha_baja) ? true : false;
                        }
                    ]],
                ],
            ]); ?>
        </div>
    </div>

   
</div>

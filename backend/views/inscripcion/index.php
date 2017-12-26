<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use kartik\select2\Select2;
use backend\models\Carrera;
use common\models\FechaHelper;
use yii\bootstrap\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-index">
    <?=$this->render('_search', ['model' => $searchModel])?>
    <div class="box">

        <div class="box-header with-border">
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Nueva Inscripción', ['/alumno/create'], ['class' => 'btn btn-success']) ?>
            <?php // Html::a('<i class="fa  fa-plus"></i> Nueva Inscripción C/Legajo', ['create'], ['class' => 'btn btn-success']) ?>
            </div> 
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    
                    'nro_legajo',  
                    [
                    'attribute'=>'alumno',
                    'label'=>'Alumno',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){      
                        $url = Url::to(['alumno/view', 'id'=>$data->alumnoId]);
                        $opciones = [];
                        return Html::a($data->datoCompletoAlumno, $url, $opciones);             
                        
                    }
                    ],           
                    [
                    'attribute'=>'carrera_id',
                    'label'=>'Carrera',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){                   
                        return $data->descripcionCarrera;
                    }                      
                    ],
                    'nro_libreta',
                    [
                    'attribute'=>'fecha',
                    'label'=>'Fecha',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return FechaHelper::fechaDMY($data->fecha);
                    }
                    ],  

                    ['class' => 'yii\grid\ActionColumn',
                     'template' => Helper::filterActionColumn('{acciones}'),
                     'buttons' => [                        
                        
                                    'acciones'=> function ($url, $model, $key) {
                                        return ButtonDropdown::widget([
                                            'encodeLabel' => false, // if you're going to use html on the button label
                                            'label' => '<span class="glyphicon glyphicon-list" aria-hidden="true"></span> Acciones',
                                            'dropdown' => [
                                                'encodeLabels' => false, // if you're going to use html on the items' labels
                                                'items' => [
                                                    [
                                                        'label' => 'Ver Legajo',
                                                        'url' => ['view', 'id' => $key],   
                                                        'visible' => true,                                                             
                                                    ],
                                                    [
                                                        'label' => 'Certificado regular',
                                                        'url' => ['imprimir', 'id' => $key],   
                                                        'linkOptions' => ['target'=>'_blank'],                                 
                                                    ],
                                                    [
                                                        'label' => 'Constancia Analitica',
                                                        'url' => ['/alumno/imprimir-analitico', 'id' => $key],
                                                        'linkOptions' => ['target'=>'_blank'],
                                                        'visible' => true,  // if you want to hide an item based on a condition, use this
                                                    ],
                                                    [
                                                        'label' => 'Inscripción a Cursada',
                                                        'url' => ['/alumno/inscripcion-cursada', 'id' => $key],
                                                        //'linkOptions' => ['target'=>'_blank'],
                                                        'visible' => true,  // if you want to hide an item based on a condition, use this
                                                    ],
                                                    [
                                                        'label' => 'Historia Academica',
                                                        'url' => ['/alumno/historial-academico', 'id' => $key],
                                                        //'linkOptions' => ['target'=>'_blank'],
                                                        'visible' => true,  // if you want to hide an item based on a condition, use this
                                                    ],
                                                    [
                                                        'label' => 'Regularidades',
                                                        'url' => ['/alumno/listar-regularidades', 'id' => $key],
                                                        //'linkOptions' => ['target'=>'_blank'],
                                                        'visible' => true,  // if you want to hide an item based on a condition, use this
                                                    ],
                                                    
                                                ],
                                                'options' => [
                                                    'class' => 'dropdown-menu-right', // right dropdown
                                                ],
                                            ],
                                            'options' => [
                                                'class' => 'btn btn-info',   // btn-success, btn-info, et cetera
                                            ],
                                            'split' => true,    // if you want a split button
                                        ]);
                                    }, 

                     ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use kartik\select2\Select2;
use backend\models\Carrera;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripciones a Carrera';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-index">
    <?=$this->render('_search', ['model' => $searchModel])?>
    <div class="box">

        <div class="box-header with-border">
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
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
                     'template' => Helper::filterActionColumn('{update} {view} {delete} {certificado} {analitico}'),
                     'buttons' => [
                        'certificado' => function ($url, $model, $key) {
                            return Html::a('<span class="fa fa-file-pdf-o" aria-hidden="true"></span>', ['imprimir', 'id' => $key], [
                                'target' => '_blank',                        
                                'title'=>'Certificado regular'
                            ]);
                        },

                        'analitico' => function ($url, $model, $key) {
                            return Html::a('<span class="fa fa-file-text-o" aria-hidden="true"></span>', ['/alumno/imprimir-analitico', 'id' => $key], [
                                'target' => '_blank',                        
                                'title'=>'Certificado analitico'
                            ]);
                        },

                     ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

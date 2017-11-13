<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Cursada;
use yii\helpers\Url;
use common\models\FechaHelper;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CursadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursada-index">
    <?=$this->render('_search', ['model' => $searchModel])?>
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Listado de actas</h3>  
                      
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,               
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
                    'attribute'=>'materia_id',
                    'label'=>'Materia',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->descripcionMateria;
                    }
                    ], 
                    [
                    'attribute'=>'condicion_id',
                    'label'=>'Condición',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->descripcionCondicion;
                    }
                    ], 
                    [
                    'attribute'=>'fecha_cierre',
                    'label'=>'Fecha Cierre',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return FechaHelper::fechaDMY($data->fecha_cierre);
                    }
                    ], 
                    'nota',                   
                    [
                    'attribute'=>'fecha_vencimiento',
                    'label'=>'Fecha Vencimiento',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return FechaHelper::fechaDMY($data->fecha_vencimiento);
                    }
                    ], 

                    ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{update} {delete}')],
                ],
            ]); ?>
        </div>
    </div>
   
</div>

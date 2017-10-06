<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Cursada;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CursadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursada-index">
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

                    
                    'fecha_inscripcion',
                    'condicion_id',
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
                    'nota',
                    // 'fecha_vencimiento',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
   
</div>

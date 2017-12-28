<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\FechaHelper;
use yii\helpers\Url;
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
                

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>

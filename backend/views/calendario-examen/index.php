<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CalendarioExamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendario de Examen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-examen-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Listado</h3>  
                <div class="pull-right">
                <?= Html::a('<i class="fa  fa-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
                </div> 
            </div>

            <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,               
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                    'attribute'=>'turno_examen_id',                   
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->descripcionTurno;
                    }
                    ], 
                    [
                    'attribute'=>'carrera_id',                   
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->descripcionCarrera;
                    }
                    ],                 
                   
                    [
                    'attribute'=>'materia_id',                   
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

                    'hora',
                    'aula',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            </div>            
            
    </div>
    
    

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use common\models\FechaHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CalendarioAcademicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendario Academico';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-academico-index">
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
            </div> 
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                    'attribute'=>'fecha_desde',                    
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return FechaHelper::fechaDMY($data->fecha_desde);
                    }
                    ],  
                    [
                    'attribute'=>'fecha_hasta',                    
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return FechaHelper::fechaDMY($data->fecha_hasta);
                    }
                    ],                      
                    'tipo_inscripcion',
                    'actividad',
                    ['class' => 'yii\grid\ActionColumn',
                     'template' => Helper::filterActionColumn('{view} {update} {delete}'),
                    ],
                ],
            ]); ?>
        </div>
    </div>
    
   
</div>

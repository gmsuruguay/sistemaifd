<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <div class="box">

        <div class="box-header with-border">            
            <h3 class="box-title">Lista de Alumnos</h3>
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
                   
                    'apellido',
                    'nombre',                       
                    'numero',                    
                    ['class' => 'yii\grid\ActionColumn',
                    'template' => Helper::filterActionColumn('{view} {update}'),
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

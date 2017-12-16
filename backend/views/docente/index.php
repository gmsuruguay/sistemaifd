<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DocenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <div class="box">

        <div class="box-header with-border">            
            <h3 class="box-title">Lista de Docentes</h3>
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
                   
                    'nro_legajo',
                    'apellido',
                    'nombre',                       
                    'numero',                    

                    ['class' => 'yii\grid\ActionColumn','template' => '{view}{update}{delete} {carrera}', 
                     'buttons' => [
                        'carrera'=>function ($url, $model, $key) {
                                            
                            return Html::a('', ['/materia-asignada/create', 'docente_id'=>$model->id], ['class' => 'fa fa-random', 'title'=>'Asignar materias a cargo']);
                            
                        },
                    ]
                ],]
            ]); ?>
        </div>
    </div>
</div>

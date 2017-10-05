<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CorrelatividadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="correlatividad-index">
    <div>
        <?= Html::a('<i class="fa  fa-plus"></i>', ['correlatividad/create','id' => $model->id,'carrera_id'=>$model->carrera_id,'anio'=>$model->anio],['class' => 'btn btn-primary modalButton', 'title'=>'Agregar materia correlativa']) ?>
    </div> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
            'label'=> 'Correlativas',
            'value'=> function ($data){
                return $data->descripcionMateria;
            }
            ],
            [
            'label'=> 'Condición',
            'value'=> function ($data){
                if($data->tipo=='a')
                {
                    return 'APROBADO';
                }
                return 'REGULAR';
            }
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{delete}'), 
            'buttons' => [                             
                 
                'delete' => function ($url, $model, $key) {
                    
                    return Html::a('', ['correlatividad/delete', 'id'=>$key], [
                        'class' => 'fa fa-trash', 
                        'title'=>'Eliminar',
                        'data' => [
                                        'confirm' => 'Está seguro de eliminar este elemento?',
                                        'method' => 'post',
                                    ],
                    ]);
                    
                },

            ]],

           
        ],
    ]); ?>
</div>
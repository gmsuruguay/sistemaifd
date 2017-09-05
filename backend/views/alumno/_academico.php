<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="inscripcion-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
				'attribute'=>'carrera_id',
				'label'=>'Carrera',
				'format'=>'text',//raw, html
				'content'=>function($data){
					return $data->descripcionCarrera;
					}
			],           
            
            'nro_libreta',
            'fecha',  
            ['class' => 'yii\grid\ActionColumn', 'template' => '{imprimir}', 
            'buttons' => [
                'imprimir' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-print" aria-hidden="true"></span> cert. regular', ['/inscripcion/imprimir', 'id' => $key], [
                        'class' => 'btn btn-success',
                        'target'=>'_blank'
                        
                    ]);
                },
            ]],             
        ],
    ]); ?>
</div>

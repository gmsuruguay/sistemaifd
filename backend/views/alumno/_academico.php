<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="inscripcion-index">

    <div class="pull-right">
        <?= Html::a('<i class="fa  fa-plus"></i> Inscipción a carrera', ['inscripcion/nuevo','id' => $model->id],['class' => 'btn btn-success']) ?>
    </div>   

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
            ['class' => 'yii\grid\ActionColumn', 'template' => '{imprimir} {listar} {historial-academico} {listar-regularidades}', 

            'buttons' => [

                'imprimir'=> function ($url, $model, $key) {
                    return ButtonDropdown::widget([
                        'encodeLabel' => false, // if you're going to use html on the button label
                        'label' => '<span class="glyphicon glyphicon-list" aria-hidden="true"></span> Acciones',
                        'dropdown' => [
                            'encodeLabels' => false, // if you're going to use html on the items' labels
                            'items' => [
                                [
                                    'label' => 'Certificado regular',
                                    'url' => ['/inscripcion/imprimir', 'id' => $key],   
                                    'linkOptions' => ['target'=>'_blank'],                                 
                                ],
                                [
                                    'label' => 'Constancia Analitica',
                                    'url' => ['imprimir-analitico', 'id' => $key],
                                    'linkOptions' => ['target'=>'_blank'],
                                    'visible' => true,  // if you want to hide an item based on a condition, use this
                                ],
                                [
                                    'label' => 'Inscripción a Cursada',
                                    'url' => ['inscripcion-cursada', 'id' => $key],
                                    //'linkOptions' => ['target'=>'_blank'],
                                    'visible' => true,  // if you want to hide an item based on a condition, use this
                                ],
                                [
                                    'label' => 'Historia Academica',
                                    'url' => ['historial-academico', 'id' => $key],
                                    //'linkOptions' => ['target'=>'_blank'],
                                    'visible' => true,  // if you want to hide an item based on a condition, use this
                                ],
                                [
                                    'label' => 'Regularidades',
                                    'url' => ['listar-regularidades', 'id' => $key],
                                    //'linkOptions' => ['target'=>'_blank'],
                                    'visible' => true,  // if you want to hide an item based on a condition, use this
                                ],
                                
                            ],
                            'options' => [
                                'class' => 'dropdown-menu-right', // right dropdown
                            ],
                        ],
                        'options' => [
                            'class' => 'btn btn-info',   // btn-success, btn-info, et cetera
                        ],
                        'split' => true,    // if you want a split button
                    ]);
                },                 

            ]],             
        ],
    ]); ?>
</div>

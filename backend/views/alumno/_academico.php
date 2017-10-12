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
            ['class' => 'yii\grid\ActionColumn', 'template' => '{imprimir} {listar}', 

            'buttons' => [

                'imprimir'=> function ($url, $model, $key) {
                    return ButtonDropdown::widget([
                        'encodeLabel' => false, // if you're going to use html on the button label
                        'label' => 'Imprimir',
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
                                
                            ],
                            'options' => [
                                'class' => 'dropdown-menu-right', // right dropdown
                            ],
                        ],
                        'options' => [
                            'class' => 'btn-success',   // btn-success, btn-info, et cetera
                        ],
                        'split' => true,    // if you want a split button
                    ]);
                },       

                'listar' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Inscribir materia/examen', ['listar-materia', 'id' => $key], [
                        'class' => 'btn btn-info',                        
                        'title'=>'inscribir en materia'
                    ]);
                },

            ]],             
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\FechaHelper;
use yii\bootstrap\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carreras Inscriptas';
?>
<div class="inscripcion-index">
    
    <h1><?= Html::encode($this->title) ?></h1>

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
            [
            'attribute'=>'fecha',
            'label'=>'Fecha Inscripción',
            'format'=>'text',//raw, html
            'content'=>function ($data){
                return FechaHelper::fechaDMY($data->fecha);
            }
            ], 
            ['class' => 'yii\grid\ActionColumn', 'template' => '{inscribir} {inscripcion}', 
            
            'buttons' => [

                'inscribir'=> function ($url, $model, $key) {
                    return ButtonDropdown::widget([
                        'encodeLabel' => false, // if you're going to use html on the button label
                        'label' => '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Inscribir',
                        'dropdown' => [
                            'encodeLabels' => false, // if you're going to use html on the items' labels
                            'items' => [
                                [
                                    'label' => 'Materia',
                                    'url' => ['listar-materia', 'id' => $model->carrera_id],                                                                       
                                ],
                                [
                                    'label' => 'Exámen',
                                    'url' => ['#'],                                    
                                    'visible' => true,  // if you want to hide an item based on a condition, use this
                                ],
                                
                            ],
                            'options' => [
                                'class' => 'dropdown-menu-right', // right dropdown
                            ],
                        ],
                        'options' => [
                            'class' => 'btn btn-primary',   // btn-success, btn-info, et cetera
                        ],
                        'split' => true,    // if you want a split button
                    ]);
                },  
                
                'inscripcion'=> function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Mis inscripciones', ['ver-inscripciones', 'id' => $key], [
                        'class' => 'btn btn-primary',                        
                        'title'=>'inscribir en materia'
                    ]);
                },


            ]],             
        ],
    ]); ?>
</div>
            
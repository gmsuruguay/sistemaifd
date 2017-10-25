<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */
$this->title = 'Inscripción Materias';
?>
<div class="carrera-view">   
    <h1><?= Html::encode($this->title) ?></h1>
    <!--
    Lista de materias para la carrera en cuestion
    !-->     
    
          <?= GridView::widget([
                'dataProvider' => $dataProvider,                   
                           
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],    
                                       
                    'descripcion',
                    [
                    'attribute'=>'anio',
                    'label'=>'Año',
                    'filter'=>array("1"=>"1° AÑO","2"=>"2° AÑO","3"=>"3° AÑO","4"=>"4° AÑO","5"=>"5° AÑO"),
                    'value'=>function($data){
                        return $data->anioMateria;
                    },

                    ],
                    'periodo',               
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{registrar}', 
                    'buttons' => [
                        'registrar' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Inscribir', ['inscribir-materia', 'id' => $key], [
                                'class' => 'btn btn-info',                        
                                'title'=>'Inscribir'
                            ]);
                        },
        
                    ]],       
                ],
            ]); ?>
       
     

</div>



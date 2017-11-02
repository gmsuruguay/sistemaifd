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

    <h3><?= Html::encode($this->title) ?></h3>
    <!--
    Lista de materias para la carrera en cuestion
    !-->     
        <?= DetailView::widget([
            'model' => $carrera,
            'attributes' => [              
                [
                'label'=>'Carrera',
                'value'=>$carrera->descripcion,
                ],                               
                [
                'label'=>'Sede',
                'value'=>$carrera->descripcionSede,
                ],
            ],
          ]) ?>  
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title">Listado de materias</h5>
            </div>
            <div class="panel-body">
             
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,   
                    'tableOptions' =>['class' => 'table bordered responsive-table'],                    
                    'rowOptions' => function($model){
                        if($model->getExisteInscripcion($model->id)>0){
                                return ['class'=>'info'];
                            }
                    },            
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
                                return $model->getExisteInscripcion($model->id)==0 ? Html::a('<i class="material-icons left">create</i> Inscribir', ['inscribir-materia', 'id' => $key,'id_carrera'=>$model->idCarrera], ['class' => 'btn','title'=>'Inscribir']) :' ';
                            },
            
                        ]],       
                    ],
                ]); ?>
            </div>
          </div>   
          <br>
          <div class="card-panel teal lighten-4"> <strong>Atención!</strong> Las materias resaltadas ya se encuentran inscriptas para el periodo vigente.</div>       
          

</div>



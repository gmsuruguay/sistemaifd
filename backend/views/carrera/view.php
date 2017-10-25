<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
//use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use backend\models\search\CorrelatividadSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */

$this->title = 'Plan de Estudio';
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-view">

    <div class="box">
        <div class="box-header with-border">
              <i class="fa fa-certificate"></i>
              <h3 class="box-title"><?=$model->descripcion?></h3>  
              <div class="pull-right">
              <?php
                if (Helper::checkRoute('update')) {
                    echo Html::a(Yii::t('app', '<i class="fa  fa-pencil"></i> Editar'), ['update', 'id' => $model->id], [
                        'class' => 'btn btn-primary'                            
                    ]);
                }
              ?>
              </div>            
        </div>

        <div class="box-body">  
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [               
               
                'duracion',
                'cohorte',
                [
                'label'=>'Sede',
                'value'=>$model->descripcionSede,
                ],
            ],
            ]) ?>     
        </div>
    </div> 

    <!--
    Lista de materias para la carrera en cuestion
    !--> 

    <div class="box">
        <div class="box-header with-border">           
            
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Agregar materia', ['materia/nuevo','id' => $model->id],['class' => 'btn btn-success']) ?>
            </div>            
        </div>
        <div class="box-body">
          <?= GridView::widget([
                'dataProvider' => $dataProvider,  
                'filterModel' => $searchModel, 
                'id'=>'grid-materia',  
                'pjax'=>true,  
                'hover'=>true,
                'panel' => [
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon glyphicon-file"></i>Lista de Materias</h3>',
                'type'=>'primary',
                'footer'=>false
                ],   
                'export'=>false,      
                'columns' => [
                    [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'value' => function ($model, $key, $index, $column) {                        
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail'=> function ($model, $key, $index, $column) {                        
                        $searchModel = new CorrelatividadSearch();
                        $searchModel->materia_id= $model->id;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                        return Yii::$app->controller->renderPartial('_correlativas', [
                            'model'=>$model,
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]);
                    },
                    ],           
                                       
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
                    [
                    'attribute'=>'condicion_id',
                    'label'=>'Condicion',
                    'value'=>function($data){
                        return $data->descripcionCondicion;
                    },
                    ],
                    [
                    'attribute'=>'condicion_examen_libre',
                    'label'=>'Condicion Examen Libre',
                    'value'=>function($data){
                        return $data->condicionExamen;
                    },
                    ],                    

                    ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{update} {delete}'), 
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                                                    
                            return Html::a('',['materia/update','id' => $key],['class' => 'modalButton fa fa-pencil','title'=>'Actualizar',]);
                            
                        } ,
                        
                        'delete' => function ($url, $model, $key) {
                            
                            return Html::a('', ['materia/delete', 'id'=>$key], [
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
    </div> 

</div>

<?php 
      Modal::begin([
        'header' => '<h3 class="text-center modal-title"><i class="fa fa-file"></i> Materia</h3>',
        'id'=>'ModalId',
        'class'=>'modal',
        'size'=>'modal-lg', 
        'clientOptions' => ['backdrop' => 'static'],  
         ]);

        echo "<div class='modalContent'></div>";
        
      Modal::end();

      

      $script = <<< JS
    
    $('body').on('beforeSubmit','form#materia-carrera' , function(e){        
        ajax($(this),refrescarGridMateria);
        return false;
    });    

    $('body').on('beforeSubmit','form#materia-correlativa' , function(e){        
        ajax($(this),refrescarGridMateria);
        return false;
    });
   
    
JS;
$this->registerJs($script);

?>
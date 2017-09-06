<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */

$this->title = $model->id;
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
                'anio_inicio',
            ],
            ]) ?>     
        </div>
    </div> 

    <!--
    Lista de materias para la carrera en cuestion
    !--> 

    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Lista de materias</h3>
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Agregar materia', ['materia/create','id' => $model->id],['class' => 'btn btn-success modalButton']) ?>
            </div>            
        </div>
        <div class="box-body">
        <?php Pjax::begin(['id'=>'grid-materia']); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,                
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],           
                                       
                    [
                    'attribute'=>'carrera_id',
                    'label'=>'Carrera',
                    'value'=>function($data){
                        return $data->descripcion;
                    }    
                    ],
                    [
                    'attribute'=>'anio',
                    'label'=>'Año',
                    'value'=>function($data){
                        return $data->anioMateria;
                    }    
                    ],

                    ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{update}{delete}'), 
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                                                    
                            return Html::a('<i class="fa  fa-pencil"></i>',['materia/update','id' => $key],['class' => 'btn btn-link modalButton','title'=>'Actualizar',]);
                            
                        } ,
                        'delete' => function ($url, $model, $key) {
                            
                            return Html::a('', ['materia/delete', 'id'=>$key], [
                                'class' => 'btn btn-link fa fa-trash', 
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
        <?php Pjax::end(); ?></div>
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
   
    
JS;
$this->registerJs($script);

?>
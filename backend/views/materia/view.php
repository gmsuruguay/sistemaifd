<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model backend\models\Materia */

$this->title = 'Detalle de Materias Correlativas';
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['carrera/view','id' =>$model->carrera_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-view">

    <div class="box">
        <div class="box-header with-border">
            <i class="fa fa-file"></i>
            <h3 class="box-title"><?=$model->descripcion?></h3>              
        </div>

        <div class="box-body">  
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [                  
                    
                    [
                    'label'=>'Carrera',
                    'value'=>$model->descripcionCarrera,
                    ],                    
                    [
                    'label'=>'Año',
                    'value'=>$model->anioMateria,
                    ],                   
                ],
            ]) ?>            
                                                            
        </div>    
    </div>    
</div>

<div class="correlatividad-index">
    <div class="box">
            <div class="box-header with-border">           
                <h3 class="box-title">Correlatividades</h3>
                <div class="pull-right">
                <?= Html::a('<i class="fa  fa-plus"></i> Agregar materia', ['correlatividad/create','id' => $model->id,'carrera_id'=>$model->carrera_id,'anio'=>$model->anio],['class' => 'btn btn-success modalButton']) ?>
                </div>            
            </div>
            <div class="box-body">   
                <?php Pjax::begin(['id'=>'grid-correlativas']); ?>
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
                <?php Pjax::end(); ?>
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
    
    $('body').on('beforeSubmit','form#materia-correlativa' , function(e){        
        ajax($(this),refrescarGridCorrelatividad);
        return false;
    });    
   
    
JS;
$this->registerJs($script);

?>
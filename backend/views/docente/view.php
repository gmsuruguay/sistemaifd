<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $model backend\models\Docente */

$this->title = 'Legajo del Docente';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>  


<div class="docente-view">   
    <div class="nav-tabs-custom">
        <ul class="app-icono nav nav-tabs pull-right">          
          <li class="active"><a href="#legajo" data-toggle="tab" aria-expanded="true"><i class="fa fa-file-text"></i> Datos Personales</a></li>          
          <li class="pull-left header "><i class="fa fa-user"></i> <?=$model->nombreCompleto?></li>
        </ul>
        <div class="tab-content">              
          
          <!-- /.tab-pane -->
          <div class="tab-pane active" id="legajo">
            <?php  echo $this->render('_legajo', ['model' => $model]); ?>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div> 

    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Lista de titulos</h3>
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Agregar titulo', ['titulo-docente/create','id' => $model->id],['class' => 'btn btn-success modalButton']) ?>
            </div>            
        </div>
        <div class="box-body">
        <?php Pjax::begin(['id'=>'grid-titulo']); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,                
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],                   
                    
                    'titulo.descripcion',

                    ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{update}{delete}'), 
                    'buttons' => [
                        'update' => function ($url, $model) {
                                                    
                            return Html::a('<i class="fa  fa-pencil"></i>',['titulo-docente/update','id' => $model->id],['class' => 'btn btn-link modalButton','title'=>'Actualizar',]);
                            
                        } ,
                        'delete' => function ($url, $model, $key) {
                            
                            return Html::a('', ['titulo-docente/delete', 'id'=>$model->id], [
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
        'header' => '<h3 class="text-center modal-title"><i class="fa fa-bolt"></i> Titulos</h3>',
        'id'=>'ModalId',
        'class'=>'modal',
        'size'=>'modal-lg', 
        'clientOptions' => ['backdrop' => 'static'],  
         ]);

        echo "<div class='modalContent'></div>";
        
      Modal::end();

      

      $script = <<< JS
    
    $('body').on('beforeSubmit','form#titulo-docente' , function(e){        
        ajax($(this),refrescarGridTitulo);
        return false;
    });    
   
    
JS;
$this->registerJs($script);

?>
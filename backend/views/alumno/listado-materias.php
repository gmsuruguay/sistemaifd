<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
//use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use backend\models\search\CorrelatividadSearch;
use yii\widgets\MaskedInput;
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
              <h3 class="box-title"><?=$model->descripcionCarrera?></h3>                         
        </div>        
    </div> 

    <!--
    Lista de materias para la carrera en cuestion
    !--> 
    <div class="row">
            <div class="col-md-4"> 
                <div class="form-group">
                <label class="control-label" for"fecha">Fecha de Inscripción</label>
                <?php echo MaskedInput::widget([
                    'id'=>'fecha',
                    'name' => 'fecha',
                    'clientOptions' => ['alias' =>  'date']
                ]); ?>
                </div >            
            </div>
    </div>
    <div class="box">
        <div class="box-header with-border">        
            
                    
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
                    ['class' => '\kartik\grid\CheckboxColumn'],      
                                       
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
                
                ],
            ]); ?>
       
        </div>
    </div> 

</div>

<?= Html::button('Inscribir', ['class' => 'btn btn-success','id'=>'btn_inscribir']) ?>
   

<?php
 $script = <<< JS
 $("#btn_inscribir").click(function(){
 var url = "index.php?r=cursada/inscribir"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
           beforeSend: function() {
              $("#respuesta").html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-5x"></i></div>');
            },
           success: function(data)
           {              
              $("#respuesta").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 }); 
 
JS;
$this->registerJs($script);
?>
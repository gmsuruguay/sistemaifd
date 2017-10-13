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
                'id'=>'grid',  
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


<?= Html::a('Inscribir','#',['class' => 'btn btn-primary', 'id'=> 'btnInscribir','data-alumno'=>$model->alumno_id]) ?>   

<?php
 $script = <<< JS

$('#btnInscribir').on('click', function(e) {
    e.preventDefault();    
    
    var url = "index.php?r=cursada/create"; // El script a dónde se realizará la petición.
    var keys = $('#grid').yiiGridView('getSelectedRows');
    var fecha = $('#fecha').val();
    var materia = JSON.stringify(keys);
    var id_alumno= $(this).data('alumno');  
    var datos = {"fecha" : fecha, "id_alumno" : id_alumno,"materia" : materia};
    if (fecha.length != 0){
        if(keys.length != 0){
            $.ajax({
            type: "get", 
            url: url,
            data: datos,
            success: function(data) {
               alert(data);   
            }
            });
            
        }else{
            sweetAlert("Oops...", "Debe seleccionar una o más materias", "error");
        }
    }else{
        sweetAlert("Oops...", "Fecha no puede estar vacio", "error");
    }
        
    /*$.ajax({
       type: "POST", 
       url: url,
       data: {dni: $("#txt-dni").val()},
       success: function(data) {
            var objeto = JSON.parse(data);
           $("#lb-nombre").text(objeto.nombre);
           $("#acta-alumno_id").val(objeto.alumno_id);
           $('#acta-nro_permiso').focus();
       }
    });*/
}); 
 
JS;
$this->registerJs($script);
?>
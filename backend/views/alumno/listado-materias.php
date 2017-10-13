<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */

?>
<div class="carrera-view">   

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
    
          <?= GridView::widget([
                'dataProvider' => $dataProvider,  
                //'filterModel' => $searchModel, 
                'id'=>'grid',                  
                'hover'=>true,
                'panel' => [
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon glyphicon-file"></i>Selecione las Materias en las que se inscribira</h3>',
                'type'=>'default',
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
               if(data==1){
                $(document).find('.modal').modal('hide');
                $.pjax.reload({ container: '#grid-cursada' });
               } 
               else{
                   alert("Ocurrio un problema durante la carga");
               }  
            }
            });
            
        }else{
            sweetAlert("Atención", "Debe seleccionar una o más materias", "error");
        }
    }else{
        sweetAlert("Atención", "Fecha no puede estar vacio", "error");
    }        
    
}); 
 
JS;
$this->registerJs($script);
?>
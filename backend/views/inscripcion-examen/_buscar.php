<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Materia;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ActaSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="acta-search">

    <div class="box">
            <div class="box-header with-border">                         
                <h3 class="box-title"><i class="fa fa-filter"></i> Criterios de búsqueda</h3>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin(['id'=>'formulario']); ?>    
                
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">Materia</label>                      
                      
                        <?= Select2::widget([
                            'name' => 'materia_id',
                            'data' => Materia::getListaMaterias(),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Mostrar todos', 'id'=>'materia_select'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                            ]);          
                        

                        ?>
                    </div>                    

                    <div class="col-md-6">
                        <label for="">Fecha de examen</label>
                        <?= Html::dropDownList('fecha', '',  [],
                            [
                                'class'=> 'form-control',
                                'id'=> 'fecha'
                            ]) 
                            ?> 
                    </div>       
                 
                </div>               
                <br> 
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Buscar', ['class' => 'btn btn-primary', 'id'=>'btn_buscar']) ?>
                  
                </div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>

</div>

<?php

$script = <<< JS
$("#materia_select").change(function(){
    var id=$(this).val();
    var url='index.php?r=inscripcion-examen/listar-fecha';
    $.get(url,{cod:id},function(data){
        $("select#fecha").html(data);
    });
}); 

$('#btn_buscar').click(function(){
    var url = "index.php?r=inscripcion-examen/consultar"; // El script a dónde se realizará la petición.
    var materia= $('#materia_select').val();
    var fecha=$('#fecha').val();    
    $.ajax({
           type: "GET",
           url: url,
           data: {'cod':materia,'fecha':fecha}, // Adjuntar los campos del formulario enviado.
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
$this->registerJs($script)
?>
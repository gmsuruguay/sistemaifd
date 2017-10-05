<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\FechaHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acta-form">
    
        <?php $form = ActiveForm::begin([
            'method'=>'post',
            'action'=>['load'], 
            'id'=>'form-acta',
            'options' => ['data-pjax' => false ]]); ?>

        <?= $form->field($model, 'libro')->label(false)->hiddenInput() ?>

        <?= $form->field($model, 'folio')->label(false)->hiddenInput() ?>

        <?= $form->field($model, 'fecha_examen')->label(false)->hiddenInput(['value'=> FechaHelper::fechaDMY($model->fecha_examen)]) ?>

        <?= $form->field($model, 'condicion_id')->label(false)->hiddenInput()?>

        <?= $form->field($model, 'materia_id')->label(false)->hiddenInput() ?>

        <?= $form->field($model, 'alumno_id')->label(false)->hiddenInput(['value'=> '0']) ?>

        <div class="row">
            <div class="col-md-4"> 
                <div class="form-group">
                    <?= Html::textInput('dni',null, ['class' => 'form-control', 'id'=> 'txt-dni', 'placeholder'=> 'Nro Dni']) ?>
                </div >            
            </div>
            <div class="col-md-2 ">
                 <div class="form-group">
                    <?= Html::a('Buscar', Url::toRoute('acta/buscar-alumno'),['class' => 'btn btn-success', 'id'=> 'linkBuscar']) ?>
                </div>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'nro_permiso')->label(false)->textInput(['placeholder'=>'Nro. de permiso']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'nota')->label(false)->textInput(['placeholder'=>'Nota']) ?>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= Html::label('','',['class' => 'form-control', 'id'=> 'lb-nombre']) ?>
            </div>            
        </div>

        <div class="form-group pull-right">
            <?= Html::submitButton('Cargar', ['class' =>'btn btn-primary', 'id'=>'submit-nota']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <div id="grid-notas"> <?php echo $grid_notas;?></div>

        
<?php
$script = <<< JS
$('#linkBuscar').on('click', function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST", 
       url: $(this).attr('href'),
       data: {dni: $("#txt-dni").val()},
       success: function(data) {
            var objeto = JSON.parse(data);
           $("#lb-nombre").text(objeto.nombre);
           $("#acta-alumno_id").val(objeto.alumno_id);
           $('#acta-nro_permiso').focus();
       }
    });
});

$(document).ready(listo);
function  listo()
{
    $('#submit-nota').click(clickSubmitNota);  
    $('.btn-eliminar').click(clickEliminarNota);   
}

function clickSubmitNota(e)
{   
    e.preventDefault();
    var form    = $('#form-acta');
    var url     = $('#form-acta').attr('action');
    var data    = form.serialize();
    $.post(url, data, cargarNota);
}

function cargarNota(response)
{
    $('#grid-notas').html(response);
    $('#txt-dni').focus();
    $('#txt-dni').val(null);
    $('#acta-nro_permiso').val(null);
    $('#acta-nota').val(null);
    //$('#acta-alumno_id').val(null);
    $('#lb-nombre').html('');

}

function clickEliminarNota(e)
{
        e.preventDefault();
        swal({   title: "Esta seguro?",   
            text: "Este registro se eliminará de forma permanente de la base de datos.",   
            type: "warning",   
            showCancelButton: true, 
            cancelButtonText: "Cancelar",    
            confirmButtonText: "Eliminar",   
            closeOnConfirm: false }, 
            function(){ 
                
                var form    = $('#form-acta');
                var url     = $(this).attr('href');
                var data    = form.serialize();
                $.post(url, data, eliminarNota); 
            });         
}

function eliminarNota(response)
{
        swal("Eliminado!", "El registro fue eliminado con éxito.", "success");
        $('#grid-notas').html(response);        
}

JS;
$this->registerJs($script)
?>

</div>

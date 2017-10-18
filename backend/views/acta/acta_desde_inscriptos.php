<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\FechaHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Acta */

$this->title = 'Crear Acta';
$this->params['breadcrumbs'][] = 'Acta';

?>
<div class="acta-create">
	<div class="box">
    	<div id="pag_uno">
    		<?= $this->render('_form_cabecera', [
		        'model' => $model,
		    	]) ?>
    	</div>

    	<div id= "pag_dos">
    		
    	</div>
    </div>    
</div>

<?php
$script = <<< JS
 var temp      = new Array();
 $("form#form-cabecera").on("beforeSubmit", function(e) {
    $.ajax({
       type: "POST", 
       url: $(this).attr('href'),
       data: $('#form-cabecera').serialize(),
       success: function(data) {   
            if(data == '0'){
                return false;
            }
            $('#pag_uno').hide();   
            $('#pag_uno').html('');     
            $('#pag_dos').html(data);
            $('#form-acta')[0].reset();
            $('#btn-guardar-notas').click(guardarNotas);
            $('#btn-actualizar-notas').click(actualizarNotas);
            $('#btn-cancelar-notas').click(cancelarNotas);
            $('#btn-cancelar-notas').css('color','black');
            $('#btn-desbloquear').click(desbloquearNotas);
            $('#btn-desbloquear').css('color','black');
            $('#btn-desbloquear').css({'padding':'15px'});
            $('#btn-eliminar').click(eliminarNota);
            $('#btn-eliminar').css('color','black');
       }
    });
    return false;
    }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
    });
   
    function guardarNotas(e)
    {
        e.preventDefault();
        $.ajax({
           type: 'POST', 
           url: $(this).attr('href'),
           data: $('#form-acta').serialize(),
           success: function(data) {   
               switch (data) {
                  case '0':
                    swal("Error", "No se pudo guardar el registro, compruebe que los datos esten correctamente ingresados.", "error");
                    break;
                  case '1':
                    swal("Información", "No se puede guardar registro porque ya existe en la base de datos.", "info");
                    break;
                  default:
                     $('#pag_dos').html(data);   
                     $('#btn-desbloquear').click(desbloquearNotas);
                     $('#btn-cancelar-notas').click(cancelarNotas);
                        $('#btn-desbloquear').css('color','black');
                        $('#btn-desbloquear').css({'padding':'15px'});
                        $('#btn-eliminar').click(eliminarNota);
                        $('#btn-eliminar').css('color','black'); 
                        $('#btn-cancelar-notas').css('color','black');
                        break;
                }
           }
        });
        return false;
    }

    function cancelarNotas(e)
    {
        e.preventDefault();
        location.reload();
        return false; 
    }

    function desbloquearNotas(e)
    {
        e.preventDefault();
        var i = 0;
        if($('#btn-desbloquear').data('id') == 1)
        {
            $('#btn-desbloquear').html('<i class="fa  fa-unlock fa-lg"></i>');
            $('#btn-desbloquear').data('id','0');
            $('#table-notas tbody td').each(function(index)
            {
                if($(this).hasClass("editable")){
                   $(this ).find('.txt-input').removeAttr('readonly');
                   temp[i] = $(this ).find('.txt-input').val();
                   i++;
                }
            });
        }
        else
        {
            $('#btn-desbloquear').html('<i class="fa  fa-lock fa-lg"></i>');
            $('#btn-desbloquear').data('id','1');
            $('#table-notas tbody td').each(function(index)
            {
                if($(this).hasClass("editable")){
                   $(this ).find('.txt-input').attr('readonly','readonly');
                   $(this ).find('.txt-input').val(temp[i]);
                   i++;
                }
            });
        }
        
    }

    function actualizarNotas(e)
    {
        e.preventDefault();
        if($('#btn-desbloquear').data('id') == 1)
        {
            return false;
        }
        $.ajax({
           type: 'POST', 
           url: $(this).attr('href'),
           data: $('#form-acta').serialize(),
           success: function(data) {   
               switch (data) {
                  case '0':
                    swal("Error", "No se pudo guardar el registro, compruebe que los datos esten correctamente ingresados.", "error");
                    break;
                  case '1':
                    swal("Exito!", "El registro se actualizo corectamente.", "info"); 
                    $('#btn-desbloquear').html('<i class="fa  fa-lock fa-lg"></i>');
                    $('#btn-desbloquear').data('id','1');
                    $('#table-notas tbody td').each(function(index)
                    {
                        if($(this).hasClass("editable")){
                           $(this ).find('.txt-input').attr('readonly','readonly');
                        }
                    });
                    break;
                }
           }
        });
        return false;
    }

    function eliminarNota(e)
    {
        e.preventDefault();
        swal({   title: "Esta seguro?",   
            text: "Esta acta se eliminará de forma permanente de la base de datos.",   
            type: "warning",   
            showCancelButton: true, 
            cancelButtonText: "Cancelar",    
            confirmButtonText: "Eliminar",   
            closeOnConfirm: false }, 
            function(){ 
                 $.ajax({
                       type: 'POST', 
                       url: $('#btn-eliminar').attr('href'),
                       data: $('#form-acta').serialize(),
                       success: function(data) {   
                           location.reload();
                        
                       }
                    });
                    
                
            });  
    }

JS;
$this->registerJs($script)
?>
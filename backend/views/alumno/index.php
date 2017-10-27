<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <div class="box">

        <div class="box-header with-border">            
            <h3 class="box-title">Lista de Alumnos</h3>
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
            </div>            
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,                
                'filterModel' => $searchModel,
                'id'=>'grid-alumno',
                'pjax'=>true,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],                  
                   
                    'apellido',
                    'nombre',                       
                    'numero',                    
                    ['class' => 'yii\grid\ActionColumn',
                    'template' => Helper::filterActionColumn('{view} {update} {usuario}'),
                    'buttons' => [
                        'usuario' => function ($url, $model, $key) {
                            return is_null($model->user_id) ? Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"></span> ', ['generar-usuario','id'=>$key], ['title'=>'Generar usuario', 'class'=>'btnRegistrar']) : '';                          
                         
                        },

                    ]],
                ],
            ]); ?>
        </div>
    </div>
</div>

<?php
 $script = <<< JS

$('.btnRegistrar').on('click', function(e) {
    e.preventDefault();    
    
   
    var url= $(this).attr('href');  
    
   
    //var datos = { "id" : id};    

    swal({   title: "Esta seguro de crear el usuario ?",   
             text: "Al crear el usuario, el alumno debera modificar la contraseña creada por defecto",   
             type: "warning",   
             showCancelButton: true,   
             confirmButtonColor: "#DD6B55",   
             confirmButtonText: "Si, crear ahora!",   
             cancelButtonText: "No, cancelar!",   
             closeOnConfirm: false,   
             closeOnCancel: false,
             showLoaderOnConfirm: true, }, 
             function(isConfirm){   
                 if (isConfirm) {     
                    setTimeout(function(){     

                        $.ajax({
                                type: "get", 
                                url: url,                                
                                success: function(data) {
                                    if(data==1){
                                    swal("Correcto!", "Usuario creado exitosamente", "success");
                                    $.pjax.reload({ container: '#grid-alumno' });
                                    } 
                                    if(data==2){
                                        swal("Error", "Ocurrio un error mientras se intentaba generar el Usuario", "error");
                                    }
                                    if(data==3){
                                        swal("Error", "Se necesita registrar primeramente el E-mail del Alumno, por favor actualice su legajo", "error");
                                    }  
                                }
                                });
                    
                    
                    }, 2000); 
                 }
                 else {
                     swal("Cancelado", "Se cancelo la operación", "error");   } 
            });
    /*$.ajax({
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
    });*/
            
       
    
    
}); 
 
JS;
$this->registerJs($script);
?>
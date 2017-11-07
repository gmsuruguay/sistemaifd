<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\FechaHelper;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */

?>

<div class="acta-examen-view">
    <div class="box">
        <div class="box-header with-border">            
           <h3 class="box-title"><?= $materia->descripcion?></h3> 
           <div class="pull-right">
               <?= Html::a('<i class="fa  fa-close fa-lg"></i>', ['cerrar-cursada'], ['id'=> 'btn-cancelar-notas']) ?> 
            </div>                      
        </div>
        
        
        <div class="box-body">
           
            <div class="pull-right">
            <?= $materia->estaCerrado ?Html::a('<i class="fa  fa-lock fa-lg"></i>', '', ['id' => 'btn-desbloquear','data-id'=>'1']).
                                                                 Html::a('<i class="fa  fa-trash fa-lg"></i>', ['destroyed-notas', 'id'=>$materia->id], ['id' => 'btn-eliminar']) :'';?>
            </div>  
            
            <?php $form = ActiveForm::begin([
                'enableClientValidation'=>  true,
                'id'=> 'form-acta',
                'action'=>['save-notas']
                ]); ?>
                <div>
                    <?= $model->isNewRecord ? $form->field($model, 'fecha_cierre',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                    ])->widget( MaskedInput::className(), [    
                                                    'clientOptions' => ['alias' =>  'date'], 
                        ]):  $form->field($model, 'fecha_cierre',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                    ])->widget( MaskedInput::className(), [    
                                                    'clientOptions' => ['alias' =>  'date'], 
                        ])->textInput(['value'=> date('d/m/Y',strtotime($model->fecha_cierre)),'readonly'=>'readonly', 'class'=>'txt-fecha'])?>
                </div>

                <div>
                    <?= $model->isNewRecord ? $form->field($model, 'fecha_vencimiento',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                    ])->widget( MaskedInput::className(), [    
                                                    'clientOptions' => ['alias' =>  'date']
                        ]): $form->field($model, 'fecha_vencimiento',[
                                        'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-calendar"></i>']]
                                    ])->widget( MaskedInput::className(), [    
                                                    'clientOptions' => ['alias' =>  'date']
                        ])->textInput(['value'=> date('d/m/Y',strtotime($model->fecha_vencimiento)),'readonly'=>'readonly', 'class'=>'txt-fecha'])?>
                </div>
                
                <table class='table' id='table-notas'>
                    <thead>
                        <tr>
                            <th width="40">#</th>
                            <th>APELLIDO Y NOMBRE</th>
                            <th>DNI </th>
                            <th width="74">NOTA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                        foreach ($query as $q)
                        {
                            echo '<tr>';
                            echo '<td>'.$i.'</td>';
                            echo '<td>'.$q->alumno->apellido.'</td>';
                            echo '<td class="editable">'.$q->alumno->numero.'</td>';
                            if($materia->estaCerrado)
                            {
                               echo '<td class="editable" >'.Html::input('text', 'nota[]', $q->nota, ['class' => 'form-control txt-input',
                                                                                                       'maxlength'=> '4',
                                                                                                       'autocomplete'=>'off',
                                                                                                       'readonly'=>'readonly']).
                                Html::hiddenInput('ids[]', $q->id).'</td>';
                            }
                            else
                            {
                                echo '<td class="editable" >'.Html::input('text', 'nota[]', '', ['class' => 'form-control',
                                                                                                 'maxlength'=> '4',
                                                                                                 'autocomplete'=> 'off']).
                                Html::hiddenInput('ids[]', $q->id).'</td>';
                            }
                            
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="form-group pull-right">
                    <?= Html::submitButton(!$materia->estaCerrado  ? 'GUARDAR' : 'ACTUALIZAR', ['class' => !$materia->estaCerrado ? 'btn btn-success' : 'btn btn-primary', 'id'=>!$materia->estaCerrado ? '':'btn-submit']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        
           
        </div>
    </div>
</div>

<?php
$script = <<< JS
    var temp      = new Array();

    $('#btn-cancelar-notas').css('color','black');
    $('#btn-desbloquear').click(desbloquearNotas);
    $('#btn-desbloquear').css('color','black');
    $('#btn-desbloquear').css({'padding':'15px'});
    $('#btn-eliminar').click(eliminarNota);
    $('#btn-eliminar').css('color','black');
    $('#btn-submit').hide();
   

    function desbloquearNotas(e)
    {
        e.preventDefault();
        var i = 0;
        if($('#btn-desbloquear').data('id') == 1)
        {
            $('#btn-desbloquear').html('<i class="fa  fa-unlock fa-lg"></i>');
            $('#btn-desbloquear').data('id','0');
            $('.txt-fecha').removeAttr('readonly');
            $('#btn-submit').show();
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
            $('.txt-fecha').attr('readonly','readonly');
            $('#btn-submit').hide();
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


    function eliminarNota(e)
    {
        e.preventDefault();
        swal({   title: "Esta seguro?",   
            text: "Los datos registrados serán borrados.",   
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

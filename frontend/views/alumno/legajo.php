<?php
use yii\helpers\Html;
use common\models\FechaHelper;
use mdm\admin\components\Helper;

$this->title = 'Datos Personales';
?>

<h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= Html::encode($this->title) ?></h3>
<div class="panel panel-default">
  
  <div class="panel-body descripcion">
  
    <p>
        Nombre completo: <?=$model->nombreCompleto?>
        <br>Sexo: <?=$model->sexo?>
        <br>Estado civil: <?=$model->estado_civil?>
        <br>Fecha de nacimiento:  <?=FechaHelper::fechaDMY($model->fecha_nacimiento)?>
        <br>Lugar de nacimiento:  <?=$model->descripcionLocalidadNacimiento?>
        <br>Nacionalidad: <?=$model->nacionalidad?>
        
        
    </p>

  </div>
</div>
<h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Datos de Contacto</h3>
<div class="panel panel-default">
    
        
   
    <div class="panel-body descripcion"> 
        <div class="pull-right">
            <?php          
                
                //if (Helper::checkRoute('update')) {
                    echo Html::a(Yii::t('app', '<i class="glyphicon glyphicon-pencil"></i> Actualizar'), ['update', 'id' => $model->id], [
                        'class' => 'btn btn-primary'                            
                    ]);
            // }  
            
            ?>   
        </div> 
        <p>
            Domicilio: <?=$model->domicilio.' '.$model->nro?>
            <br>Localidad: <?=$model->descripcionLocalidad?>
            <br>Teléfono: <?=$model->telefono?>
            <br>Celular:  <?=$model->celular?>
            <br>E-mail:  <?=$model->email?>       
            
            
        </p>
        
    </div>
        
        
  
</div>

<h3><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Datos Académicos</h3>
<div class="panel panel-default">
  
  <div class="panel-body descripcion">
  
    <p>
        Colegio Secundario: <?=$model->descripcionColegio?>
        <br>Titulo: <?=$model->descripcionTitulo?>         
    </p>

  </div>
</div>


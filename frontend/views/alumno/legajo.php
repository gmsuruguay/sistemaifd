<?php
use yii\helpers\Html;
use common\models\FechaHelper;
use mdm\admin\components\Helper;

$this->title = 'Datos Personales';
?>

<div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                <h3><i class="material-icons medium left">person</i> <?= Html::encode($this->title) ?></h3>
                </div>
                <div class="card-action">
                
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
        </div>
</div>

<div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                <h3><i class="material-icons medium left">contact_mail</i> Datos de Contacto</h3>
                </div>
                <div class="card-action">
                
                    <div class="right-align">
                    <?php          
                        
                        if (Helper::checkRoute('actualizar')) {
                            echo Html::a(Yii::t('app', '<i class="material-icons left">edit</i> Actualizar'), ['actualizar', 'id' => $model->id], [
                                'class' => 'btn-floating btn-large waves-effect waves-light'                            
                            ]);
                        }  
                    
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
        </div>
</div>


<div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                <h3><i class="material-icons medium left">school</i> Datos Académicos</h3>
                </div>
                <div class="card-action">
                
                <p>
                    Colegio Secundario: <?=$model->descripcionColegio?>
                    <br>Titulo: <?=$model->descripcionTitulo?>         
                 </p>

                </div>
            </div>
        </div>
</div>


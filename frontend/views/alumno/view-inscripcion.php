<?php
use yii\helpers\Html;
use common\models\FechaHelper;
use mdm\admin\components\Helper;
use  yii\web\Session;
use backend\models\Carrera;

$this->title = 'Resumen Formulario de Preinscripción';

$session = Yii::$app->session;
$carrera_id = $session->get('id_carrera');
$carrera= Carrera::modelCarrera($carrera_id);
?>

<div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><h4><i class="material-icons medium left">description</i>  <?= Html::encode($this->title) ?></h4></span>
   

                </div>
                <div class="card-action">
                        <h5>Datos Personales</h5>
                        <p>
                            Nombre completo: <?=$model->nombreCompleto?>
                            <br>DNI: <?=$model->numero?>
                            <br>CUIL: <?=$model->cuil?>
                            <br>Sexo: <?=$model->sexo?>
                            <br>Estado civil: <?=$model->estado_civil?>
                            <br>Fecha de nacimiento:  <?=FechaHelper::fechaDMY($model->fecha_nacimiento)?>                        
                            <br>Nacionalidad: <?=$model->nacionalidad?>
                            
                            
                        </p>
                        <h5>Carrera a Inscribirse</h5>
                        <p>
                        Carrera: <?=$carrera->descripcionCarreraSede?>
                        </p>
                </div> 
                <div class="card-action">
                <div class="row">
                    <div class="col m12">
                        <?php                     

                        if(Helper::checkRoute('imprimir-formulario')){
                            echo Html::a('<i class="material-icons left">local_printshop</i> Imprimir', ['imprimir-formulario', 'id' => $model->id], [
                                'class' => 'btn waves-effect waves-light btn-large right',                  
                                
                            ]);
                        }
                        ?>
                    </div>
                 </div>
                </div>
                
                
            </div>
        </div>
</div>

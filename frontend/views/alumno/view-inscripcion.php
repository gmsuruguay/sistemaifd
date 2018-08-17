<?php
use yii\helpers\Html;
use common\models\FechaHelper;
use mdm\admin\components\Helper;
use  yii\web\Session;
use backend\models\Carrera;
use backend\models\Inscripcion;

$this->title = 'Resumen Formulario de Preinscripción';

$session = Yii::$app->session;
$id= $session->get('nro_inscripcion');
$inscripcion=Inscripcion::modelInscripcion($id);
$carrera= Carrera::modelCarrera($inscripcion->carrera_id);
?>

<div class="row">
        <div class="col m8 s12 offset-m2">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><h5 class="center-align"><?= Html::encode($this->title) ?></h5></span>
   

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
                <div class="form-group">
                   
                        <?php                     

                        if(Helper::checkRoute('imprimir')){
                            echo Html::a('<i class="material-icons left">local_printshop</i> Imprimir', ['imprimir', 'id' => $id], [
                                'class' => 'btn cyan waves-effect waves-light',                  
                                
                            ]);
                        }
                        ?>
                   
                 </div>
                </div>
                
                
            </div>
        </div>
</div>

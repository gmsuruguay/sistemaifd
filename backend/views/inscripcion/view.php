<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Inscripción';
$this->params['breadcrumbs'][] = ['label' => 'Inscripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-view">

    <div class="box">
        <div class="box-header with-border">
            <i class="fa fa-file"></i>
            <h3 class="box-title">Datos de Inscripción</h3>              
        </div>

        <div class="box-body">  
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nro_legajo',
                [
                'label'=>'Alumno',
                'value'=>$model->datoCompletoAlumno,
                ],
                [
                'label'=>'Carrera',
                'value'=>$model->descripcionCarrera,
                ],
                'nro_libreta',
                'fecha',
                'observacion:ntext',                
                [
                'label'=>'Fotocopia DNI',
                'value'=>$model->getDocumentacion($model->fotocopia_dni),
                ],
                [
                'label'=>'Certificado Nacimiento',
                'value'=>$model->getDocumentacion($model->certificado_nacimiento),
                ],
                [
                'label'=>'Certificado Visual',
                'value'=>$model->getDocumentacion($model->certificado_visual),
                ],
                [
                'label'=>'Certificado Auditivo',
                'value'=>$model->getDocumentacion($model->certificado_auditivo),
                ],
                [
                'label'=>'Certificado Foniatrico',
                'value'=>$model->getDocumentacion($model->certificado_foniatrico),
                ],
                [
                'label'=>'Foto',
                'value'=>$model->getDocumentacion($model->foto),
                ],
                [
                'label'=>'Constancia de CUIL',
                'value'=>$model->getDocumentacion($model->constancia_cuil),
                ],
                [
                'label'=>'Planilla Prontuarial',
                'value'=>$model->getDocumentacion($model->planilla_prontuarial),
                ]
            ],
        ]) ?>  
                                                            
        </div>    
    </div> 
    

</div>

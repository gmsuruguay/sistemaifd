<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

?>
    
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nro_legajo',                
                [
                'label'=>'Carrera',
                'value'=>$model->descripcionCarrera,
                ],
                'nro_libreta',
                [
                'label'=>'fecha',
                'value'=>FechaHelper::fechaDMY($model->fecha)
                ],
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
                ],
                [
                'label'=>'Estado',
                'format'=>'raw',
                'value'=>$model->estado == 0 ? Html::tag('span','Preinscripto',['class'=> 'label label-info']) : Html::tag('span','Inscripto',['class'=> 'label label-success']),
                ]
            ],
        ]) ?>                                                           
<div class="btn-group">
        <?php             
            
                
                if (Helper::checkRoute('update')) {
                    echo Html::a(Yii::t('app', '<i class="fa  fa-pencil"></i> Editar'), ['update', 'id' => $model->id], [
                        'class' => 'btn btn-primary'                            
                    ]);
                }  
                              
                
         
        ?>
</div>     
    



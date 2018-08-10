<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioAcademico */

$this->title = 'Detalle de la actividad académica';
$this->params['breadcrumbs'][] = ['label' => 'Calendario Academicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-academico-view">

    <div class="box">    
        <div class="box-body"> 
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                'label'=>'Fecha Desde',
                'value'=> FechaHelper::fechaDMY($model->fecha_desde),
                ],
                [
                'label'=>'Fecha Hasta',
                'value'=> FechaHelper::fechaDMY($model->fecha_hasta),
                ],
                'tipo_inscripcion',
                [
                'label'=>'Turno Examen',
                'value'=>$model->descripcionTurno,
                ],
                'actividad',
                [
                'label'=>'Fecha inicio inscripción',
                'value'=> FechaHelper::fechaDMY($model->fecha_inicio_inscripcion),
                ],
                [
                'label'=>'Fecha fin inscripción',
                'value'=> FechaHelper::fechaDMY($model->fecha_fin_inscripcion),
                ],
            ],
        ]) ?>
        </div>
        <div class="btn-group box-footer">
            <?php                   
                
                    
                    if (Helper::checkRoute('update')) {
                        echo Html::a(Yii::t('app', '<i class="fa  fa-pencil"></i> Editar'), ['update', 'id' => $model->id], [
                            'class' => 'btn btn-primary'                            
                        ]);
                    }
                    
                    if (Helper::checkRoute('delete')) {
                        echo Html::a(Yii::t('app', '<i class="fa  fa-trash"></i> Eliminar'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('yii', 'Está seguro de eliminar este registro ?'),
                                'method' => 'post',
                            ],
                        ]);
                    }            
            ?>
        </div>
    </div>
</div>

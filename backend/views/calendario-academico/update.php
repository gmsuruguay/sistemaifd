<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioAcademico */

$this->title = 'Actualizar Calendario Academico';
$this->params['breadcrumbs'][] = ['label' => 'Calendario Academico', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calendario-academico-update">    
    <?php 
    $model->fecha_desde = $model->fecha_desde ? date('d/m/Y', strtotime($model->fecha_desde)) : null; 
    $model->fecha_hasta = $model->fecha_hasta ? date('d/m/Y', strtotime($model->fecha_hasta)) : null;
    $model->fecha_inicio_inscripcion = $model->fecha_inicio_inscripcion ? date('d/m/Y', strtotime($model->fecha_inicio_inscripcion)) : null;
    $model->fecha_fin_inscripcion = $model->fecha_fin_inscripcion ? date('d/m/Y', strtotime($model->fecha_fin_inscripcion)) : null;
    ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

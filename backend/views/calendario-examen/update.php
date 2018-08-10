<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioExamen */

$this->title = 'Calendario Examen';
$this->params['breadcrumbs'][] = ['label' => 'Calendario Examens', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calendario-examen-update">
    
    <?php $model->fecha_examen = $model->fecha_examen? date('d/m/Y', strtotime($model->fecha_examen)) : null; ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

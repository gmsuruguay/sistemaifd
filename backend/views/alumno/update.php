<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Alumno */

$this->title = 'Alumno';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="alumno-update">
    
    <?php $model->fecha_nacimiento = $model->fecha_nacimiento? date('d/m/Y', strtotime($model->fecha_nacimiento)) : null; ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

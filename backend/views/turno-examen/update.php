<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TurnoExamen */

$this->title = 'Turno Examen';
$this->params['breadcrumbs'][] = ['label' => 'Turno Examen', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="turno-examen-update">    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Inscripcion';
$this->params['breadcrumbs'][] = ['label' => 'Inscripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="inscripcion-update">    
    <?php $model->fecha = $model->fecha ? date('d/m/Y', strtotime($model->fecha)) : null; ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

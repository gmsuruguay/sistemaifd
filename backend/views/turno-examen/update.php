<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TurnoExamen */

$this->title = 'Update Turno Examen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Turno Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="turno-examen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\InscripcionMateria */

$this->title = 'Update Inscripcion Materia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripcion Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inscripcion-materia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

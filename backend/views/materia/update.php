<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Materia */

$this->title = 'Update Materia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materia-update">  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

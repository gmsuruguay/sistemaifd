<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TituloDocente */

$this->title = 'Update Titulo Docente: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Titulo Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="titulo-docente-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

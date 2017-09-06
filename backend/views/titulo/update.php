<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Titulo */

$this->title = 'Actualizar Titulo ';
$this->params['breadcrumbs'][] = ['label' => 'Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="titulo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

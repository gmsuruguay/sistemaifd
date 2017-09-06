<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */

$this->title = 'Actualizar Carrera';
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="carrera-update">    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

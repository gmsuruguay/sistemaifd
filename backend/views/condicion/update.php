<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Condicion */

$this->title = 'Actualizar Condición';
$this->params['breadcrumbs'][] = ['label' => 'Condicions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="condicion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Localidad */

$this->title = 'Actualizar datos';
$this->params['breadcrumbs'][] = ['label' => 'Localidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="localidad-update">    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

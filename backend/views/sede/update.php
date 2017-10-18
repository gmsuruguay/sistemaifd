<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sede */

$this->title = 'Actualizar Sede';
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sede-update">  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

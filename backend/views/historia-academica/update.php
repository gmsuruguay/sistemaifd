<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HistoriaAcademica */

$this->title = 'Update Historia Academica: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Historia Academicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="historia-academica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

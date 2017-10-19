<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioAcademico */

$this->title = 'Update Calendario Academico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Calendario Academicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calendario-academico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

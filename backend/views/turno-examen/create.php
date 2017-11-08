<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TurnoExamen */

$this->title = 'Turno Examen';
$this->params['breadcrumbs'][] = ['label' => 'Turno Examen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turno-examen-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

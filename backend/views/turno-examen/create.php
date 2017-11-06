<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TurnoExamen */

$this->title = 'Create Turno Examen';
$this->params['breadcrumbs'][] = ['label' => 'Turno Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turno-examen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

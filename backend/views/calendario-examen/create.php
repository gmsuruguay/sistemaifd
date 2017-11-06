<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioExamen */

$this->title = 'Create Calendario Examen';
$this->params['breadcrumbs'][] = ['label' => 'Calendario Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-examen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

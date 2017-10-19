<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioAcademico */

$this->title = 'Create Calendario Academico';
$this->params['breadcrumbs'][] = ['label' => 'Calendario Academicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-academico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

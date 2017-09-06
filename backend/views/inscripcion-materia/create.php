<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\InscripcionMateria */

$this->title = 'Create Inscripcion Materia';
$this->params['breadcrumbs'][] = ['label' => 'Inscripcion Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-materia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

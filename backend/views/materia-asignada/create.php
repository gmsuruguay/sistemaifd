<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MateriaAsignada */

$this->title = 'Create Materia Asignada';
$this->params['breadcrumbs'][] = ['label' => 'Materia Asignadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-asignada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

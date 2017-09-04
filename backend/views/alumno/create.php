<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Alumno */

$this->title = 'Nuevo Alumno';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-create">
<?php $model->fecha_nacimiento = $model->fecha_nacimiento? date('d/m/Y', strtotime($model->fecha_nacimiento)) : null; ?>
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

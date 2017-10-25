<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioAcademico */

$this->title = 'Calendario Academico';
$this->params['breadcrumbs'][] = ['label' => 'Calendario Academico', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
$model->fecha_desde = $model->fecha_desde ? date('d/m/Y', strtotime($model->fecha_desde)) : null; 
$model->fecha_hasta = $model->fecha_hasta ? date('d/m/Y', strtotime($model->fecha_hasta)) : null;
?>
<div class="calendario-academico-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

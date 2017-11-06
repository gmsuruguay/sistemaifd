<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CalendarioExamen */

$this->title = 'Calendario de Examen';
$this->params['breadcrumbs'][] = ['label' => 'Calendario Examen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-examen-create">   
<?php $model->fecha_examen = $model->fecha_examen? date('d/m/Y', strtotime($model->fecha_examen)) : null; ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

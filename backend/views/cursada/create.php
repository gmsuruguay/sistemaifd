<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cursada */

$this->title = 'Registro de Cursada';
$this->params['breadcrumbs'][] = ['label' => 'Cursadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursada-create">

<?php $model->fecha_inscripcion = $model->fecha_inscripcion? date('d/m/Y', strtotime($model->fecha_inscripcion)) : null; ?>
<?php $model->fecha_vencimiento = $model->fecha_vencimiento? date('d/m/Y', strtotime($model->fecha_vencimiento)) : null; ?>
<?php $model->fecha = $model->fecha? date('d/m/Y', strtotime($model->fecha)) : null; ?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

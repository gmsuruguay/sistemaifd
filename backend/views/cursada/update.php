<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cursada */

$this->title = 'Update Cursada: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cursadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursada-update">

<?php $model->fecha_inscripcion = $model->fecha_inscripcion? date('d/m/Y', strtotime($model->fecha_inscripcion)) : null; ?>
<?php $model->fecha_vencimiento = $model->fecha_vencimiento? date('d/m/Y', strtotime($model->fecha_vencimiento)) : null; ?>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

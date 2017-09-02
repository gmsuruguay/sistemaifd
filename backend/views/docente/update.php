<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Docente */

$this->title = 'Update Docente: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="docente-update">

<?php $model->fecha_nacimiento = $model->fecha_nacimiento? date('d/m/Y', strtotime($model->fecha_nacimiento)) : null; ?>
    <?= $this->render('_form', [
        'model' => $model,
        'model_titulo' =>$model_titulo
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Docente */

$this->title = 'Docente';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="docente-update">

<?php $model->fecha_nacimiento = $model->fecha_nacimiento? date('d/m/Y', strtotime($model->fecha_nacimiento)) : null; ?>
    <?= $this->render('_form_update', [
        'model' => $model,
        'model_titulo' =>$model_titulo,
        'titulos'=>$titulos,
    ]) ?>

</div>

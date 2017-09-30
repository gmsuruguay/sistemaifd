<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MateriaAsignada */

$this->title = 'Prof. '.$model->docente->nombreCompleto;
$this->params['breadcrumbs'][] = ['label' => 'Asignar Materias', 'url' => ['create', 'docente_id' => $model->docente_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="materia-asignada-update">

    <div class="box">
    	<div class="box-body">
    		<?= $this->render('_form', [
		        'model' => $model,
		        'materias'=> $materias,
		    ]) ?>
    	</div>
    </div>
</div>

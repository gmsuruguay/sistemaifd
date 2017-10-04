<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Acta */

$this->title = 'Actualizar Cabecera de Acta';
$this->params['breadcrumbs'][] = ['label' => 'Actas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Carga de Calificaciones', 'url' => ['load', 'libro' => $model->libro, 
												                                            'folio' => $model->folio,
												                                            'fecha_examen'=> $model->fecha_examen,
												                                            'condicion_id'=>$model->condicion_id,
												                                            'materia_id'=>$model->materia_id,]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="acta-update">

     <div class="box">
     	<div class="box-header with-border">            
            <h3 class="box-title">Datos de Acta</h3>         
        </div>
    	<div class="box-body">
    		<?= $this->render('_form', [
		        'model' => $model,
		        'materias'=> $materias,
		    ]) ?>
    	</div>
    </div>

</div>

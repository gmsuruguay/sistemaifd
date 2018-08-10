<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Acta */

$this->title = 'Registrar Actas Historicas';
$this->params['breadcrumbs'][] = ['label' => 'Actas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acta-create">
	<div class="box">
     	<div class="box-header with-border">            
            <h3 class="box-title">Datos de Acta</h3>         
        </div>
    	<div class="box-body">
    		<?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
    	</div>
    </div>    

</div>

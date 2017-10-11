<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Acta */

$this->title = 'Creacion de Cursada';
$this->params['breadcrumbs'][] = ['label' => 'Cursada', 'url' => ['index']];

?>
<div class="acta-create">
	<div class="box">
     	<div class="box-header with-border">            
            <h3 class="box-title">Datos de Cursada</h3>         
        </div>
    	<div class="box-body">
    		<?= $this->render('_form_index', [
		        'model' => $model,
		    ]) ?>
    	</div>
    </div>    

</div>
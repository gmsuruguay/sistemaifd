<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ColegioSecundario */

$this->title = 'Actualizar Colegio Secundario';
$this->params['breadcrumbs'][] = ['label' => 'Colegio Secundarios', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="colegio-secundario-update">    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Correlatividad */

$this->title = 'Create Correlatividad';
$this->params['breadcrumbs'][] = ['label' => 'Correlatividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correlatividad-create">
    
    <?= $this->render('_form', [
        'model' => $model,
        'listado_materias'=> $listado_materias,
    ]) ?>

</div>

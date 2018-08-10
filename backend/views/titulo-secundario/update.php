<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TituloSecundario */

$this->title = 'Actualizar Titulo Secundario';
$this->params['breadcrumbs'][] = ['label' => 'Titulo Secundarios', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="titulo-secundario-update"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

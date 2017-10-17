<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TituloSecundario */

$this->title = 'Nuevo Titulo Secundario';
$this->params['breadcrumbs'][] = ['label' => 'Titulo Secundarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulo-secundario-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

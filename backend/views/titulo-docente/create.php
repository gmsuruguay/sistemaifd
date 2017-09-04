<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TituloDocente */

$this->title = 'Create Titulo Docente';
$this->params['breadcrumbs'][] = ['label' => 'Titulo Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulo-docente-create">    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

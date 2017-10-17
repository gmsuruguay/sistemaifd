<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Titulo */

$this->title = 'Nuevo Titulo Docente';
$this->params['breadcrumbs'][] = ['label' => 'Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulo-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

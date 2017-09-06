<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Materia */

$this->title = 'Nueva Materia';
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-create">    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

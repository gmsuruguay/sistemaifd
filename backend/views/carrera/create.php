<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */

$this->title = 'Nueva Carrera';
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

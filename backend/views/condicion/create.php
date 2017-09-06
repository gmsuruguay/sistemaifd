<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Condicion */

$this->title = 'Nueva Condición';
$this->params['breadcrumbs'][] = ['label' => 'Condicions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condicion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

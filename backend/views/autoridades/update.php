<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Autoridades */

$this->title = 'Actualizar datos institucionales' ;
$this->params['breadcrumbs'][] = ['label' => 'Autoridades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="autoridades-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

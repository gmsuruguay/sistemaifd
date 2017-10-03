<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ColegioSecundario */

$this->title = 'Update Colegio Secundario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Colegio Secundarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="colegio-secundario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

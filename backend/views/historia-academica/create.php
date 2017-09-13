<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\HistoriaAcademica */

$this->title = 'Create Historia Academica';
$this->params['breadcrumbs'][] = ['label' => 'Historia Academicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historia-academica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

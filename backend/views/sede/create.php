<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sede */

$this->title = 'Create Sede';
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

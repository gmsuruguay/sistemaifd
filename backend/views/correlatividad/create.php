<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Correlatividad */

$this->title = 'Create Correlatividad';
$this->params['breadcrumbs'][] = ['label' => 'Correlatividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correlatividad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

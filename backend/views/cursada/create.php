<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cursada */

$this->title = 'Create Cursada';
$this->params['breadcrumbs'][] = ['label' => 'Cursadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

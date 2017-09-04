<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TituloDocente */

$this->title = 'Create Titulo Docente';
$this->params['breadcrumbs'][] = ['label' => 'Titulo Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulo-docente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

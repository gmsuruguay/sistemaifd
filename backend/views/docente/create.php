<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Docente */

$this->title = 'Create Docente';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

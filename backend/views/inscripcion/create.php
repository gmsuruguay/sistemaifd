<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Nueva Inscripción';
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

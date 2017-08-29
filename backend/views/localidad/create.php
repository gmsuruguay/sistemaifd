<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Localidad */

$this->title = 'Nueva localidad';
$this->params['breadcrumbs'][] = ['label' => 'Localidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localidad-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

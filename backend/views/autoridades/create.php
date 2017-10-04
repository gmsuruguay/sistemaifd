<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Autoridades */

$this->title = 'Información Institucional';
$this->params['breadcrumbs'][] = ['label' => 'Autoridades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autoridades-create">    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

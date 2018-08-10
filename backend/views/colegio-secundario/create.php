<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ColegioSecundario */

$this->title = 'Nuevo Colegio Secundario';
$this->params['breadcrumbs'][] = ['label' => 'Colegio Secundarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colegio-secundario-create">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

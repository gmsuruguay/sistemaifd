<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Docente */

$this->title = 'Nuevo Docente';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-create">   
<?php $model->fecha_nacimiento = $model->fecha_nacimiento? date('d/m/Y', strtotime($model->fecha_nacimiento)) : null; ?>
    <?= $this->render('_form', [
        'model' => $model,       
    ]) ?>

</div>

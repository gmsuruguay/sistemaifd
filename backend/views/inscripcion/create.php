<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Nueva Inscripción a Carrera';
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-create">   
<?php $model->fecha = $model->fecha ? date('d/m/Y', strtotime($model->fecha)) : null; ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\HistoriaAcademicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historia-academica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_inscripcion') ?>

    <?= $form->field($model, 'alumno_id') ?>

    <?= $form->field($model, 'materia_id') ?>

    <?= $form->field($model, 'condicion_id') ?>

    <?php // echo $form->field($model, 'libro') ?>

    <?php // echo $form->field($model, 'folio') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'nota') ?>

    <?php // echo $form->field($model, 'asistencia') ?>

    <?php // echo $form->field($model, 'tipo_inscripcion') ?>

    <?php // echo $form->field($model, 'fecha_vencimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

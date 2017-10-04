<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ActaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'libro') ?>

    <?= $form->field($model, 'folio') ?>

    <?= $form->field($model, 'nota') ?>

    <?= $form->field($model, 'asistencia')->checkbox() ?>

    <?php // echo $form->field($model, 'condicion_id') ?>

    <?php // echo $form->field($model, 'alumno_id') ?>

    <?php // echo $form->field($model, 'materia_id') ?>

    <?php // echo $form->field($model, 'fecha_examen') ?>

    <?php // echo $form->field($model, 'resolucion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

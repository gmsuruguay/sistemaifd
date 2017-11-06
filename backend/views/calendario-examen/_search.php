<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CalendarioExamenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendario-examen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'carrera_id') ?>

    <?= $form->field($model, 'materia_id') ?>

    <?= $form->field($model, 'fecha_examen') ?>

    <?= $form->field($model, 'hora') ?>

    <?php // echo $form->field($model, 'aula') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

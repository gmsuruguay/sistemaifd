<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\InscripcionMateriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripcion-materia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_inscripcion') ?>

    <?= $form->field($model, 'alumno_id') ?>

    <?= $form->field($model, 'materia_id') ?>

    <?= $form->field($model, 'nota') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'nro_acta') ?>

    <?php // echo $form->field($model, 'condicion_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

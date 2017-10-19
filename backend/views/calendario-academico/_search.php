<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CalendarioAcademicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendario-academico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_desde') ?>

    <?= $form->field($model, 'fecha_hasta') ?>

    <?= $form->field($model, 'tipo_inscripcion') ?>

    <?= $form->field($model, 'actividad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

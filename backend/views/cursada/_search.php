<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CursadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
   

    <?= $form->field($model, 'fecha_inscripcion') ?>

    <?= $form->field($model, 'condicion_id') ?>

    <?= $form->field($model, 'alumno_id') ?>

    <?= $form->field($model, 'materia_id') ?>

    <?php echo $form->field($model, 'nota') ?>

    <?php echo $form->field($model, 'fecha_vencimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
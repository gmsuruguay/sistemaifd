<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TituloDocente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titulo-docente-form">

    <?php $form = ActiveForm::begin(['options' => ['id'=>'titulo-docente','data-pjax' => true ]]); ?>  

    <?= $form->field($model, 'docente_id')->textInput() ?>

    <?= $form->field($model, 'titulo_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

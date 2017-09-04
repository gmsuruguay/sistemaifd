<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use backend\models\Alumno;

/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripcion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alumno_id')->widget(Select2::classname(), [                                            
                                            'data' => Alumno::getListaAlumnos(),
                                            'language' => 'es',
                                            'options' => ['placeholder' => 'Seleccione alumno'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                            ]) ?>

    <?= $form->field($model, 'carrera_id')->textInput() ?>

    <?= $form->field($model, 'nro_libreta')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'observacion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Carrera;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\MateriaAsignada */
/* @var $form yii\widgets\ActiveForm */
$carreras = Carrera::find()->all();

?>

<div class="materia-asignada-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= Html::label('Carreras') ?>
                    <?= Html::dropDownList('carrera', 
                                            'carreraId', 
                                            ArrayHelper::map($carreras, 'id', 'descripcion'),
                                            [
                                                'prompt'=>'-------------',
                                                'class'=> 'form-control',
                                                'onchange' => '$.get("'.Url::toRoute('docente/change-carrera').'",{carreraId: $(this).val()})
                                                                .done(function(data)
                                                                {
                                                                    $("select#materiaasignada-materia_id").html(data);
                                                                });'
                                            ]) 
                                            ?> 

    <?= $form->field($model, 'docente_id')->textInput() ?>

    

    <select id="materiaasignada-materia_id" class="form-control" name="MateriaAsignada[materia_id]" aria-required="true"></select>


    <?= $form->field($model, 'fecha_alta')->textInput() ?>

    <?= $form->field($model, 'fecha_baja')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Docente */

$this->title = 'Asignar Espacio Curricular a cargo';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="asignar-materia-view">

    <div class="box">
        <div class="box-header with-border">
            <i class="fa fa-file"></i>
            <h3 class="box-title"><?=$model->apellido?></h3>              
        </div>

        <div class="box-body">  
           <?php $form = ActiveForm::begin([
                                    'id' => 'login-form', 
                                    'class' => 'form-horizontal',
                                    'enableClientValidation' => false]); ?>
                <div class='form-inline'>
                    <?= Html::label('Carreras') ?>
                    <?= Html::dropDownList('carrera', 
                                            'carreraId', 
                                            ArrayHelper::map($carreras, 'id', 'descripcion'),
                                            [
                                                'prompt'=>'-------------',
                                                'onchange' => '$.get("'.Url::toRoute('docente/change-carrera').'",{carreraId: $(this).val()})
                                                                .done(function(data)
                                                                {
                                                                    $("select#materia").html(data);
                                                                });'
                                            ]) 
                                            ?> 
                    <select name="materia" id="materia">
                        
                    </select>      
      
                    <?= Html::submitButton('Asignar', ['class' => 'btn btn-primary']) ?>

                </div>
            
            <?php ActiveForm::end(); ?>
                                                            
        </div>    
    </div>
    
</div>













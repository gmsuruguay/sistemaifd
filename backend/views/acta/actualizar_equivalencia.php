<?php

use yii\helpers\Html;
use backend\models\Materia;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use yii\widgets\DetailView;
use common\models\FechaHelper;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */
/* @var $form yii\widgets\ActiveForm */
$this->title='Actualizar Equivalencia';
?>

<div class="acta-form">

    <div class="box">
        <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title"><?=$inscripcion->nombreAlumno?></h3> 
                         
        </div>

        <div class="box-body">  
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [                
                
                [
                'label'=>'Carrera',
                'value'=>$inscripcion->descripcionCarrera,  
                ],
               
                
            ],
        ]) ?> 
        </div>
    </div> 
    
    
        <?= $this->render('_form_equivalencia', [
                    'model' => $model,
                    'inscripcion'=>$inscripcion
                ]) ?>
   

    

    
    

</div>

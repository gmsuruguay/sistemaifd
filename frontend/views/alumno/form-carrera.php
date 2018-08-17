<?php

use yii\helpers\Html;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Carrera;
/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */
$this->title = 'Selecciona Carrera';
?>
<div class="carrera-view">   
    <h4><?= Html::encode($this->title) ?></h4>
    <div class="container">
        <div class="row">
            <div class="col m8 s12 offset-m2">
              <div class="card-panel ">
            
                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'class'=>'col s12 m12'
                    ]); ?>
                    <div class="row">
                        <?php
                        
                        echo $form->field($model, 'carrera_id',['options'=>['class'=>'input-field col m12']])->dropDownList(Carrera::getListaCarrerasSede(), ['prompt'=>'Seleccione Carrera'])->label(false); 
                    
                    ?>
                    </div>
                    
                
                    <div class="form-group">
                    <?= Html::submitButton('ACEPTAR', ['class' => 'btn cyan waves-effect waves-light']) ?>
                    </div>
                <?php ActiveForm::end(); ?> 
             </div>
            </div>
        </div>
    </div>
         

</div>


<?php
 $script = <<< JS

$('select').material_select();   
 
JS;
$this->registerJs($script);
?>
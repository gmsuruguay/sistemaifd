<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Materia;
use kartik\select2\Select2;
use backend\models\Cursada;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\search\ActaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acta-search">

    <div class="box">
            <div class="box-header with-border">                         
                <h3 class="box-title"><i class="fa fa-filter"></i> Criterios de búsqueda</h3>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>    
                
                <div class="row">
                    
                    <div class="col-md-6">
                      <?= $form->field($model, 'materia_id')->widget(Select2::classname(), [
                
                                                'data' => Materia::getListaMaterias(),
                                                'language' => 'es',
                                                'options' => ['placeholder' => 'Mostrar todos', 'id'=>'materia_select'],
                                                'pluginOptions' => [
                                                    'allowClear' => true
                                                ],
                                                ])

                            ?>
                    </div>                    

                    <div class="col-md-6">
                    <label for="">Fecha de examen</label>
                    <?= Html::dropDownList('fecha', '',  [],
                        [
                            'class'=> 'form-control',
                            'id'=> 'fecha'
                        ]) 
                        ?> 
                    </div>                 
                 
                </div>               
                 
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Buscar', ['class' => 'btn btn-primary']) ?>
                  
                </div>

                <?php ActiveForm::end(); ?>
            </div>
    </div>

</div>

<?php

$script = <<< JS
$("#materia_select").change(function(){
    var id=$(this).val();
    var url='index.php?r=acta/listar-fecha';
    $.get(url,{cod:id},function(data){
        $("select#fecha").html(data);
    });
});    
JS;
$this->registerJs($script)
?>
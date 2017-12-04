<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Carrera;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$carreras = Carrera::find()->all();

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title"> <?= ($impreso=='0')?'Pedidos de certificados de Alumnos':'Reimpresión de certificados de Alumnos'?></h3>            
        </div>
        <div class='box-body'>

            
                <?php $form = ActiveForm::begin(['id'=>'formulario', 'options' => ['data-pjax' => false ]]); ?>
                    <div class='row'>
                        <div class='col-sm-6 col-md-6'>
                            <?= Html::dropDownList('carrera', $carrera_id,ArrayHelper::map($carreras, 'id', 'descripcion'), ['class'=> 'form-control','prompt'=>'--Seleccionar Carrera--', 'onchange' => '$.get("'.Url::toRoute('pedido/cargar-fecha').'",{carreraId: $(this).val(), impreso:'.$impreso.'})
                                                                    .done(function(data)
                                                                    {
                                                                        $("select#fecha").html(data);
                                                                    });']) ?>
                        </div>
                        <div class='col-sm-4 col-md-4'>
                            <?= Html::dropDownList('fecha', '',  [],
                                                [
                                                    'class'=> 'form-control',
                                                    'id'=> 'fecha'
                                                ]) 
                                                ?> 
                        </div>  
                        <div class='col-sm-2 col-md-2'>
                            <?= Html::submitButton('ACEPTAR', ['class' => 'btn  btn-primary']) ?>
                        </div>                        
                    </div>  
                    <?= Html::hiddenInput('impreso', $impreso); ?>               
                <?php ActiveForm::end(); ?>
           
            <br>
            <div id='grid-views'></div>
            <hr>
             <div class="text-center">
                    <?= ($impreso=='0')?Html::a('Ver impresos', ['index', 'impreso'=> '1'], ['class' => 'btn btn-info']):Html::a('Ver no  impresos', ['index'], ['class' => 'btn btn-info'])?>
            </div> 
        </div>

    </div>
</div>
<?php
$script = <<< JS
$("form#formulario").on("beforeSubmit", function(e) {
    $.ajax({
       type: "POST", 
       url: $(this).attr('href'),
       data: $(this).serialize(),
       success: function(data) {              
            $('#grid-views').html(data);
            $('.btn-imprimir').click(imprimir);
            
       }
    });
    return false;
    }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
    });
 

    function imprimir(e)
    {
        e.preventDefault();
        url = $(this).attr("href");
        location.reload();
        window.open(url, '_blank');

    }

JS;
$this->registerJs($script)
?>
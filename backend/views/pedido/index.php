<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Carrera;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$carreras = Carrera::find()->all();

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Pedidos de certificados de Alumnos</h3>            
        </div>
        <div class='box-body'>

            <?php Pjax::begin(); ?>
                <?php $form = ActiveForm::begin(['id'=>'form-carreras', 'options' => ['data-pjax' => true ]]); ?>
                    <div class='row'>
                        <div class='col-sm-8 col-md-10'>
                            <?= Html::dropDownList('carrera', $carrera_id,ArrayHelper::map($carreras, 'id', 'descripcion'), ['class'=> 'form-control','prompt'=>'--Seleccionar Carrera--',]) ?>
                        </div>
                        <div class='col-sm-4 col-md-2'>
                            <?= Html::submitButton('ACEPTAR', ['class' => 'btn  btn-primary']) ?>
                        </div>                        
                    </div>                 
                <?php ActiveForm::end(); ?>
            
            <br>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="pill" href="#pag_uno">Constancias</a></li>
                <li><a data-toggle="pill" href="#pag_dos">Analiticos</a></li>
            </ul>

            <div class="tab-content">
              <div id="pag_uno" class="tab-pane fade in active">
                <h3>Constancias</h3>
                <div class="pull-right">
                    <?= $constancias->getCount()>0?Html::a('<i class="fa  fa-print"></i> Imprimir', ['print','tipo'=>'c','carrera_id'=>$carrera_id], ['class' => 'btn btn-primary', 'target'=>'blank', 'data-pjax'=> '0']):'' ?>
                </div> 
                <?= GridView::widget([
                    'dataProvider' => $constancias,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                         ['label'=> 'Apellido y Nombre',
                         'value' => 'alumno.nombreCompleto'],
                        'cantidad',
                        'fecha_pedido',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                
              </div>
              <div id="pag_dos" class="tab-pane fade">
                <h3>Analíticos</h3>
                <div class="pull-right">
                    <?= $analiticos->getCount()>0?Html::a('<i class="fa  fa-print"></i> Imprimir', ['print','tipo'=>'a','carrera_id'=>$carrera_id], ['class' => 'btn btn-primary', 'target'=>'blank', 'data-pjax'=> '0']):'' ?>
                </div> 
                <?= GridView::widget([
                    'dataProvider' => $analiticos,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['label'=> 'Apellido y Nombre',
                         'value' => 'alumno.nombreCompleto'],
                        'cantidad',
                        'fecha_pedido',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
              </div>
            </div>
            <?php Pjax::end(); ?>
        </div>

    </div>
</div>

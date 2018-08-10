<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Carrera;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Acta */

$this->title = 'Registrar Cierre de Cursada';
$this->params['breadcrumbs'][] = ['label' => 'Cursada', 'url' => ['index']];

?>
<div class="acta-create">
	<div class="box">
     	<div class="box-header with-border">            
            <h3 class="box-title">Materias</h3>         
        </div>

    	<div class="box-body">
            <?php Pjax::begin(); ?>
                <?php $form = ActiveForm::begin(['action'=>['cerrar-cursada'],'id'=>'form-carreras', 'options' => ['data-pjax' => true ]]); ?>
                    <div class='row'>
                        <div class='col-sm-8 col-md-10'>
                            <?= Html::dropDownList('carrera', $carrera_id,Carrera::getListaCarreras(), ['class'=> 'form-control','prompt'=>'--Seleccionar Carrera--',]) ?>
                        </div>
                        <div class='col-sm-4 col-md-2'>
                            <?= Html::submitButton('ACEPTAR', ['class' => 'btn  btn-primary']) ?>
                        </div>                        
                    </div>                 
                <?php ActiveForm::end(); ?>

        		<?php if($show):?>
                    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                        'label'=> 'Materia',
                        'value'=> function ($data){
                                return $data->descripcion; 
                            }
                        ],                  
                        [
                        'label'=> 'Cantidad de alumnos',
                        'value'=> function ($data){
                                return $data->cantidadAlumnos; 
                            }
                        ],

                        [
                        'label'=> 'Cerrado',
                        'value'=> function ($data){
                                return $data->estaCerrado?'SI':'NO';
                            }
                        ], 

                        ['class' => 'yii\grid\ActionColumn', 'template' => '{lista}',
                         'buttons' => [
                            'lista'=>function ($url, $model, $key) {
                                                
                                return ($model->cantidadAlumnos > 0)?Html::a('', ['/cursada/cerrar-materia', 'id'=>$model->id], ['class' => 'btn-eliminar glyphicon glyphicon-list-alt']):'<span class="glyphicon glyphicon-list-alt"></span>';
                                
                                },
                            ]
                        ]
                        ]
                        ]); 
                    ?>
                <?php else: ?>
                    <?= '';?>
                <?php endif ?>
            <?php Pjax::end(); ?>

    	</div>
    </div>    

</div>
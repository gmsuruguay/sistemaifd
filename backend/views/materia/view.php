<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Materia */

$this->title = 'Detalle de Materia';
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index','id' =>$model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-view">

    <div class="box">
        <div class="box-header with-border">
            <i class="fa fa-file"></i>
            <h3 class="box-title"><?=$model->descripcion?></h3>              
        </div>

        <div class="box-body">  
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [                  
                    
                    [
                    'label'=>'Carrera',
                    'value'=>$model->descripcionCarrera,
                    ],                    
                    [
                    'label'=>'Año',
                    'value'=>$model->anioMateria,
                    ],                   
                ],
            ]) ?>            
                                                            
        </div>    
    </div>    
</div>

<div class="correlatividad-index">
    <div class="box">
            <div class="box-header with-border">           
                <h3 class="box-title">Correlatividades</h3>
                          
            </div>
            <div class="box-body">   
                <?php Pjax::begin(['id'=>'grid-correlativas']); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            
                            [
                            'label'=> 'Correlativas',
                            'value'=> function ($data){
                                return $data->descripcionMateria;
                            }
                            ],
                            [
                            'label'=> 'Condición',
                            'value'=> function ($data){
                                if($data->tipo=='a')
                                {
                                    return 'APROBADO';
                                }
                                return 'REGULAR';
                            }
                            ],                        
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
    </div>

</div>
<!--Docentes asignados -->
<div class="docentes-index">
    <div class="box">
            <div class="box-header with-border">           
                <h3 class="box-title">Docente a cargo</h3>                          
            </div>
            <div class="box-body">   
               
                    <?= GridView::widget([
                        'dataProvider' => $docentes_dataProvider,        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            
                            [
                            'attribute'=> 'fecha_alta',
                            'value'=> function ($data){
                                return FechaHelper::fechaDMY($data->fecha_alta);
                            }
                            ],
                            [
                            'attribute'=> 'docente_id',
                            'value'=> function ($data){
                                return $data->docenteACargo;
                            }
                            ], 
                            [
                            'attribute'=> 'fecha_baja',
                            'value'=> function ($data){
                                return FechaHelper::fechaDMY($data->fecha_baja);
                            }
                            ],                       
                        ],
                    ]); ?>
               
            </div>
    </div>

</div>



<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Inscripción Materia';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombreAlumno, 'url' => ['view', 'id' => $model->alumno_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-view">

    <div class="box">
        <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title"><?=$model->nombreAlumno?></h3> 
                         
        </div>

        <div class="box-body">  
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [                
                
                [
                'label'=>'Carrera',
                'value'=>$model->descripcionCarrera,  
                ],
                'nro_libreta',
                
            ],
        ]) ?> 
        </div>
    </div> 

    <div class="box">
        <div class="box-header with-border">           
        <h3 class="box-title">Seleccione las materias que cursara</h3>          
        </div>
        <div class="box-body">
        <?php Pjax::begin(['id'=>'grid-materia']); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,  
                'filterModel' => $searchModel,     
                'hover'=>true,
                'panel' => [
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon glyphicon-file"></i>Lista de Materias</h3>',
                'type'=>'primary',
                'footer'=>false
                ],   
                'export'=>false,      
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],           
                                       
                    'descripcion',
                    [
                    'attribute'=>'anio',
                    'label'=>'Año',
                    'filter'=>array("1"=>"1° AÑO","2"=>"2° AÑO","3"=>"3° AÑO","4"=>"4° AÑO","5"=>"5° AÑO"),
                    'value'=>function($data){
                        return $data->anioMateria;
                    }

                    ],

                    ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{inscribir}'), 
                    'buttons' => [
                        'inscribir' => function ($url, $model, $key) {
                                                    
                            return Html::a('','#',['class' => 'modalButton glyphicon glyphicon-check','title'=>'Inscribir',]);
                            
                        } ,                        

                    ]],
                ],
            ]); ?>
        <?php Pjax::end(); ?></div>
        </div>
    </div> 
    

    

</div>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Regularidades';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombreAlumno, 'url' => ['view', 'id' => $model->alumno_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materias-regulares-view">

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
        <h3 class="box-title">Lista </h3>    
       
        <div class="box-body">

        <?= GridView::widget([
                'dataProvider' => $dataProvider,              
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],                  
                    [
                    'attribute'=>'materia_id',                        
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->descripcionMateria;
                    }
                    ], 
                    [
                    'attribute'=>'fecha_cierre',   
                    'label'=>'Fecha Regularidad',                    
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return FechaHelper::fechaDMY($data->fecha_cierre);
                    }
                    ],   
                    [
                    'attribute'=>'fecha_vencimiento',                        
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return FechaHelper::fechaDMY($data->fecha_vencimiento);
                    }
                    ], 
                                                            
                                      
                   
                ],
            ]); ?>
            
        </div>
    </div>    

</div>
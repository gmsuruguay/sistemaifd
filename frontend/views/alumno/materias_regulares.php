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
?>
<div class="materias-regulares-view">
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="card-panel">
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

    <div class="card">
        <div class="card-content">           
        <h3 class="card-title">Lista </h3>    
        </div>
        <div class="card-action">

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
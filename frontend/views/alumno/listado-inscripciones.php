<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use common\models\FechaHelper;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Mis Inscripciones';

?>
<div class="inscripcion-view">

    <h3><?= Html::encode($this->title) ?></h3>   
    
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

    
        
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h5 class="panel-title"> Cursadas - Períodos lectivos vigentes </h5>
            </div>
            <div class="panel-body">
           
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,  
                    'tableOptions' =>['class' => 'table bordered responsive-table'],                                         
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'], 
                        
                        [
                        'attribute'=>'fecha_inscripcion',
                        'label'=>'Fecha Inscripción',
                        'format'=>'text',//raw, html
                        'content'=>function ($data){
                            return FechaHelper::fechaDMY($data->fecha_inscripcion);
                        }
                        ],                                       
                        [
                        'attribute'=>'materia_id',
                        'label'=>'Materia',
                        'format'=>'text',//raw, html
                        'content'=>function ($data){
                            return $data->descripcionMateria;
                        }
                        ],    
    
                    ],
            ]);?>
             </div>
        </div>
       

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Materia */

$this->title = 'Detalle de Materias Correlativas';
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
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

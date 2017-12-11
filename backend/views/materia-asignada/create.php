<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prof. '.$docente->nombreCompleto;

$this->params['breadcrumbs'][] = ['label' => 'Docente', 'url' => ['docente/index']];
$this->params['breadcrumbs'][] = 'Asignar Materias';

?>
<div class="materia-asignada-index">
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Asignar Materias</h3>    
        </div>
         <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
                'docente'=> $docente,
            ]) ?>
        </div>
        <div class="box-header with-border">            
            <h3 class="box-title">Materias asignadas</h3>    
        </div>
         <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                    'label'=> 'Carrera',
                    'value'=> function ($data){
                        return $data->materia->descripcionCarrera;
                    }
                    ],
                    [
                    'label'=> 'Materia',
                    'value'=> function ($data){
                        return $data->descripcionMateria;
                    }
                    ],
                    [
                    'label'=> 'Fecha Alta',
                    'value'=> function ($data){
                        return date('d/m/Y',strtotime($data->fecha_alta));
                    }
                    ],
                    [
                    'label'=> 'Fecha Baja',
                    'value'=> function ($data){
                        return ($data->fecha_baja=='')?'------':date('d/m/Y',strtotime($data->fecha_baja));
                    }
                    ],
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{update}{delete}'],
                ],
            ]); ?>
        </div>
    </div>

   
</div>

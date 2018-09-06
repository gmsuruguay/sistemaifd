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

$this->title = 'Historial Academico';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombreAlumno, 'url' => ['view', 'id' => $model->alumno_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hitoria-academica-view">

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

            <table  class="table table-hover">
            <thead>     
              <tr>  
                <th>Espacio Curricular</th>           
                <th>Año</th>
                <th>Calificación</th>               
                <th>Fecha</th>                
                <th>Condición</th>   
                <th>Detalle</th>     
              </tr>
            </thead> 
            <tbody>
                <?php foreach ($materias as $dato): ?>
                <tr>
                    <td><?=$dato['descripcion'] ?></td>  
                    <td><?=$dato['anio'] ?></td>  
                    <td><?=$dato['nota'] ?></td>  
                    <td><?=FechaHelper::fechaDMY($dato['fecha']) ?></td>    
                    <td><?=$dato['condicion'] ?></td>                
                    <td><?=$dato['tipo'] ?></td>  
                        
                </tr>
                <?php endforeach; ?>
            </tbody>                
            </table>
            
        </div>
    </div>    

</div>
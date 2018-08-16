<?php 

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use common\models\FechaHelper;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Mi Historia Academica';

?>

<div class="historia-academica-view">

    <h4><?= Html::encode($this->title) ?></h4>  
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
        
            <table class="responsive-table" width="100%">
                <thead>     
                  <tr>  
                    <th>Espacio Curricular</th>           
                    <th>Año</th>
                    <th>Calificación</th>               
                    <th>Fecha</th>                
                    <th>Condición</th>   
                    <th>Tipo</th>     
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
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


    <table  width="100%">
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
                <td><?=$dato['periodo'] ?></td>  
                <td><?=$dato['nota'] ?></td>  
                <td><?=FechaHelper::fechaDMY($dato['fecha']) ?></td>                  
                <td><?=$dato['tipo'] ?></td>  
                       
            </tr>
            <?php endforeach; ?>
        </tbody>                
    </table>

</div>
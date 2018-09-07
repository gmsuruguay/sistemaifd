<?php
use common\models\FechaHelper;
use yii\helpers\Html;
?>

<div class="box">
    <div class="box-header with-border">
            <h3 class="box-title">Listado de Materias</h3>
            
    </div>
    <div class="box-body">
        <table  width="100%">
            <thead>     
              <tr> 
                <th>#</th> 
                <th>Resolución</th>           
                <th>Fecha</th>
                <th>Materia</th>               
                <th>Descripción</th>    
                <th>Equivalencia</th>   
                <th>Nota</th>   
                <th></th>         
              </tr>
            </thead> 
            <tbody>
                <?php foreach ($materias as $i=>$dato): ?>
                <tr>
                    <td><?=($i+1)?></td>                 
                    <td><?=$dato->resolucion ?></td>  
                    <td><?=FechaHelper::fechaDMY($dato->fecha_examen) ?></td>   
                    <td><?=$dato->descripcionMateria ?></td> 
                    <td><?=$dato->descripcion ?></td>  
                    <td><?=$dato->tipo_equivalencia ?></td>  
                    <td><?=$dato->nota ?></td>  
                    <td><?= Html::a('', ['actualizar-equivalencia', 'id'=>$dato->id,'inscripcion_id'=>$inscripcion->id], ['class' => 'glyphicon glyphicon-pencil', 'title'=>'Actualizar equivalencia'])?></td>         
                </tr>
                <?php endforeach; ?>
            </tbody>                
        </table>
    </div>
    
</div>
    
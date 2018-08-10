<?php 

use yii\helpers\Html;
use common\models\FechaHelper;
use backend\models\Autoridades;
use backend\models\Materia;
?>

<header class="centrar-text encabezado">  
        <?= Html::img('@web/img/logo.png', ['width' => '60px','height'=>'60px','alt' => 'Logo Gobierno de Jujuy']) ?>   
        <h6>MINISTERIO DE EDUCACIÓN</h6>	
        <h6>INSTITUTO DE EDUCACION SUPERIOR N° 6</h6>
        <h6>REGION III</h6>	 
</header>
<h2 class="centrar-text">Listado de Inscripciones</h2>
<h4><?=Materia::descripcionCompletaMateria($id)?></h4>

<table  width="100%">
    <thead>     
      <tr> 
        <th>#</th>         
        <th>Alumno</th>         
        <th>Observaciones</th>         
      </tr>
    </thead> 
    <tbody>
        <?php foreach ($model as $i=>$dato): ?>
        <tr>
            <td><?=($i+1)?></td>           
            <td><?=$dato->datoCompletoAlumno ?></td>  
            <td></td>                   
        </tr>
        <?php endforeach; ?>
    </tbody>                
</table>

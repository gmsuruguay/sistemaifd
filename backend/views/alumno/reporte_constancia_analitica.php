<?php 

use yii\helpers\Html;
use common\models\FechaHelper;
use backend\models\Autoridades;
?>

<header class="centrar-text encabezado">  
        <?= Html::img('@web/img/logo.png', ['width' => '60px','height'=>'60px','alt' => 'Logo Gobierno de Jujuy']) ?>   
        <h6>MINISTERIO DE EDUCACIÓN</h6>	
        <h6>INSTITUTO DE EDUCACION SUPERIOR N° 6</h6>
        <h6>REGION III</h6>	 
</header>

<h4 class="centrar-text">CONSTANCIA ANALITICA</h4>

<section class="margen-superior">
    <p align="justify">
    El que suscribe, <?=Autoridades::getDatoRector()?>, Rector a cargo del I.E.S. N ° 6 de Ciudad Perico, HACE CONSTAR QUE:
    <b><?=$model->nombreAlumno?></b> con  D.N.I. <b><?=$model->alumno->numero?></b>
    , ha cursado y aprobado los Espacios Curriculares que se detallan y que corresponden a la Estructura Curricular de la Carrera
    <b><?= $model->descripcionCarrera ?></b> <?= $model->resolucionCarrera ?>.    
    </p>   
</section>

<table  width="100%">
    <thead>     
      <tr>  
        <th>Espacio Curricular</th>           
        <th>Año</th>
        <th>Calificación</th>               
        <th>Fecha</th>    
        <th>Libro Folio</th>   
        <th>Condición</th>   
        <th>Observaciones</th>         
      </tr>
    </thead> 
    <tbody>
        <?php foreach ($analitico as $dato): ?>
        <tr>
            <td><?=$dato->descripcionMateria ?></td>  
            <td><?=$dato->anioMateria .'/'.$dato->periodoMateria ?></td>  
            <td><?=$dato->nota ?></td>  
            <td><?=FechaHelper::fechaDMY($dato->fecha_examen) ?></td>  
            <td><?=$dato->libro .'/'. $dato->folio ?></td>  
            <td><?=$dato->descripcionCondicion ?></td>  
            <td><?=$dato->resolucion ?></td>         
        </tr>
        <?php endforeach; ?>
    </tbody>                
</table>
<br>
<div><b>PROMEDIO GENERAL: <?=$promedio?> </b></div>

<section>
    <p align="justify">
    A solicitud del interesado/a y al solo efecto de ser presentada ante las autoridades que lo requieran,
     se expide la presente Constancia Analitica que sella y firma en Ciudad Perico a los 
     <?=date('j')?> días  del   mes <?= ucfirst($mes)?> del año  <?=date('Y')?>
    </p>
</section>

<footer class="centrar-text pie">
    Instituto de Educación Superior Nº 6- Avda. Belgrano 456 – Ciudad Perico- Tel. 0388- 4914288 <br>
    Rivadavia Nº 218 – Bº Centro- Sede El Carmen- Te. 0388- 4933267 <br>
    Avda. Crucero Gral. Belgrano Nº 522 – Sede Monterrico- Tel. 0388-4944893
</footer>
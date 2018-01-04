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
<div class="derecha-text">
    <p>
    Ciudad Perico, <?=date('j')?> de <?= ucfirst($mes)?> de <?=date('Y')?>
    </p>
    <p><b> Sol. N°</b> <?=$model->id?></p>
</div>
<div class="centrar-text">
<h4>SOLICITUD DE PERMISO DE EXAMEN</h4>
</div>
<section class="izquierda-text">
    <p>Al Rector/a</p>
    <p>Del I.E.S N° 6</p>
    <p><?=Autoridades::getDatoRector()?></p>
    <p>S....../......D</p>
</section>
<section>
    <p class="sangria" align="justify">
    El / La que suscribe <?=$model->nombreAlumno ?> con D.N.I N° <?=$model->alumno->numero?>
    de la carrera <?=$model->materia->carrera->descripcion?>. Que se dicta en la sede
    <?=$model->materia->carrera->sede->localidad?>, solicita a Ud. Quiera disponer se me
    expida permiso de examen en el siguiente espacio curricular que se detalla a continuación.
    </p>
</section>
<section>
    <table class="tbl" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>CONDICION</th>
                <th>ESPACIO CURRICULAR</th>                
            </tr>
        </thead>
        <tbody>
            <tr align="center">
                <td>1</td>
                <td><?=$model->descripcionCondicion?></td>
                <td><?=$model->descripcionMateria?></td>
            </tr>           
           
        </tbody>
    </table>
</section>
<section>
    <p class="sangria">
        Saludo a Ud. Atte.
    </p>
</section>
<p class="margen-sup derecha-text">
 <span class="firma">Firma del Alumno</span>
</p>

<footer class="centrar-text pie">
    <p>
    Esta solicitud debe ser validado indefectiblemente con sello y firma de la
    autoridad del I.E.S. N° 6 dentro de las 36 hs. habiles posteriores a la emisión del mismo.
    </p>
</footer>
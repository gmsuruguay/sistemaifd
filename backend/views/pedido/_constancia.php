<?php 

use yii\helpers\Html;
$this->title = 'Certificado de Alumno Regular';
?>

<header class="centrar-text encabezado">  
        <?= Html::img('@web/img/logo.png', ['width' => '40px','height'=>'40px','alt' => 'Logo Gobierno de Jujuy']) ?>   
        <h6>GOBIERNO DE LA PROVINCIA DE JUJUY</h6>
        <h6>MINISTERIO DE EDUCACIÓN</h6>	
        <h6>IES N° 6 - PERICO</h6>	 
</header>
<section class="contenedor margen-superior">
    <p align="justify" class="sangria">
    Por la presente se hace constar que: <b><?= $c->alumno->nombreCompleto ?></b>  con    
    D.N.I. <b><?=$c->alumno->numero?></b> es Alumno/a de la Carrera
    <b><?= $c->carrera->descripcion ?></b> en este establecimiento.    
    </p>

    <p align="justify" class="sangria">
    A solicitud del interesado y al solo efecto de ser presentada ante <?= !is_null($c->interesado)? strtoupper($c->interesado): 'las autoridades que lo requieran ' ?>,
     se expide la presente constancia que sella y firma en Ciudad Perico a los 
     <?=date('j')?> Días  del   mes <?= ucfirst($mes)?> del año  <?=date('Y')?>

    </p>
   
</section>

<footer class="centrar-text pie">
    <p>Instituto de Educación Superior Nº 6- Avda. Belgrano 456 – Ciudad Perico- Tel. 0388- 4914288 </p>
    <p>Rivadavia Nº 218 – Bº Centro- Sede El Carmen- Te. 0388- 4933267 </p>
    <p>Avda. Crucero Gral. Belgrano Nº 522 – Sede Monterrico- Tel. 0388-4944893</p>
</footer>

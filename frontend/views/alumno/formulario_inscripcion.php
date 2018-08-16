<?php 

use yii\helpers\Html;
use common\models\FechaHelper;
$this->title = 'Formulario de Inscripción';
?>

<table style="width:100%;">
<tr>
    <td style="width:25%; text-align:left;">
        <?= Html::img('@web/img/logo_ifd_header.png', ['alt' => 'SURI']) ?> 
    </td>
    <td style="width:70%; text-align:right;">
        <div style="font-size:12px;">
        <p><b>Fecha de Inscripción</b> <?=  FechaHelper::fechaDMY($inscripcion->fecha) ?> </p>
        <p><b>Nro. Inscripción</b> <?= $inscripcion->id ?> </p>
        </div>
    </td>
</tr>
</table>
<br>
<div  style="text-align:center;">
    <h4>Formulario de Inscripción</h4>    
</div>

<table width="70%">

        
        <tr>    
            <th colspan="2">Carrera a Inscribirse</th>
        </tr>

        <tr>
            <th align="right" scope="colgroup" colspan="2">Carrera</th>
            <td scope="colgroup" colspan="2"><?= $inscripcion->descripcionCarrera?></td>
        </tr>

        <tr>
            <th align="right" scope="colgroup" colspan="2">Sede</th>
            <td scope="colgroup" colspan="2"><?= $inscripcion->carrera->descripcionSede?></td>
        </tr>     
        <tr>    
            <th colspan="2">Datos Personales</th>
        </tr>
	    <tr>
	        <th align="right" scope="colgroup" colspan="2">Nombre completo </th>
	        <td scope="colgroup" colspan="2"><?= ucwords(strtolower($inscripcion->nombreAlumno)) ?></td>
	    </tr>
            
	    <tr>
	        <th align="right" scope="colgroup" colspan="2">DNI </th>
	        <td scope="colgroup" colspan="2"><?= $inscripcion->alumno->numero?></td>
	    </tr>

        <tr>
	        <th align="right" scope="colgroup" colspan="2">CUIL </th>
	        <td scope="colgroup" colspan="2"><?= $inscripcion->alumno->cuil?></td>
	    </tr>        

        <tr>
	        <th align="right" scope="colgroup" colspan="2">Estado civil </th>
	        <td scope="colgroup" colspan="2"><?= $inscripcion->alumno->estado_civil?></td>
	    </tr>

        <tr>
	        <th align="right" scope="colgroup" colspan="2">Fecha de nacimiento </th>
	        <td scope="colgroup" colspan="2"><?= FechaHelper::fechaDMY($inscripcion->alumno->fecha_nacimiento)?></td>
	    </tr>

        <tr>
	        <th align="right" scope="colgroup" colspan="2">Nacionalidad </th>
	        <td scope="colgroup" colspan="2"><?= $inscripcion->alumno->nacionalidad?></td>
	    </tr>
	    
	    <tr>
	        <th align="right" scope="colgroup" colspan="2">Dirección :</th>
	        <td scope="colgroup" colspan="2"><?= ucwords(strtolower($inscripcion->alumno->domicilio)).' '.$inscripcion->alumno->nro.' Localidad '.ucwords(strtolower($inscripcion->alumno->descripcionLocalidad)) ?></td>
	    </tr>	
       


       	   
    </table>
<br>
<footer style="text-align:center;">
    Instituto de Educación Superior Nº 6- Avda. Belgrano 456 – Ciudad Perico- Tel. 0388- 4914288 <br>
    Rivadavia Nº 218 – Bº Centro- Sede El Carmen- Tel. 0388- 4933267 <br>
    Avda. Crucero Gral. Belgrano Nº 522 – Sede Monterrico- Tel. 0388-4944893
</footer>

<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use backend\models\CalendarioAcademico;

$this->title = 'SURI - PREINSCRIPCION';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-preinscripcion">
    <h3 class="center-align"><?= Html::encode($this->title) ?></h3>

    <p>Antes de comenzar el proceso de preinscripción deberas crear un usuario y contraseña, por lo tanto asegurate de tener una dirección de correo electrónico válida y que funcione correctamente. </p>
    <p>Si ya te preinscribiste, podés ingresar al sistema con tu DNI y la clave que ingresaste en el proceso de preinscripción. Ingresa ahora haciendo clic  <?= Html::a('aqui', ['site/login']) ?></p>
    <p>Tu preinscripción no está completa hasta que presentes toda la documentación y el formulario obtenido por este sistema, firmado por vos, en Preceptoria.</p>
  
    <div class="center-align" style="margin-top:50px;">
    <?php 
     if ( CalendarioAcademico::estaHabilitado('PREINSCRIPCION') ) {
        echo Html::a(Yii::t('app', '<i class="material-icons left">create</i> Iniciar Preinscripcion'), ['signup'], [
            'class' => 'btn waves-effect waves-light'                            
        ]);
        }
    ?>
    </div>
    

    
</div>

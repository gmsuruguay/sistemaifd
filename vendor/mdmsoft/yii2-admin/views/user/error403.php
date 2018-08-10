<?php
use yii\helpers\Url;
use yii\helpers\Html;

$url_site=Yii::$app->urlManager->createUrl('/site/login');
$url= str_replace('/gestion', '', $url_site);
?>
<div class="col-lg-8 col-lg-offset-2 text-center" style="margin-top:100px;">
    <div style="font-size:100px; color:grey">
            <span class="glyphicon glyphicon-lock"></span>            
    </div>
    <h1>Error 403 !</h1>
    <p class="lead text-muted">Oops, Acceso restringido !</p>
    
    <br />
    <div class="col-lg-6  col-lg-offset-3">
        <div class="btn-group btn-group-justified">       
            
            <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Regresar a la página principal',$url, ['class' => 'btn btn-success'])?>
        </div>
    </div>  
         
</div>


<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\models\Tramite;
use yii\helpers\Html;
use yii\helpers\Url;

$identity = Yii::$app->user->identity;
?>

<header class="main-header">

<?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg"> <img src="img/logo_ifd_header.png" class="img-responsive"
                                 alt="Logo" width="80%" /></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">    
                   
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">   
                        <i class="fa fa-user"></i>
                        <span class="hidden-xs">Hola <?= $identity ? $identity->perfilNombre : '' ?> </span>                     
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            
                                <span class="fa-stack fa-3x">
                                    <i class="fa fa-circle fa-stack-2x" style="color: #fff"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse" style="color: grey"></i>
                                </span>   
                            <p>
                            <small><?= Yii::$app->user->identity->perfilNombre.' '.Yii::$app->user->identity->perfilApellido ?></small>                         
                            </p>
                        </li>
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=Html::a('<i class="fa fa-user"></i> Perfil',['usuario/perfil'], $options = ["class"=>"btn btn-primary btn-flat"])?>
                               
                            </div>                            
                            <div class="pull-right">
                                <?= Html::a(
                                    '<i class="fa fa-power-off"></i> Cerrar sesión',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-danger btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
</header>

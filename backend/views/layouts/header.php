<?php
use yii\helpers\Html;
use yii\bootstrap\Alert;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg"> <img src="img/logo_ifd_header.png" class="img-responsive"
                                 alt="Logo" width="80%" /></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="img/user.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username  ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="img/user.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>                                
                                <small><?= Yii::$app->user->identity->perfilNombre.' '.Yii::$app->user->identity->perfilApellido ?></small>
                            </p>
                        </li>
                       
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <p class="">
                                <?=Html::a('<i class="fa fa-unlock" aria-hidden="true"></i> Cambiar Contraseña',['/admin/user/change-password'],['class'=> 'btn btn-default btn-flat btn-block'])?></a>
                            </p>
                            <p class="">
                                <?= Html::a(
                                    '<i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesion',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat btn-block']
                                ) ?>
                            </p>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less 
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>

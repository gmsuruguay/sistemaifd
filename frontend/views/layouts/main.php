<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>  

  <nav class="teal lighten-1" role="navigation">
    <div class="nav-wrapper "><a id="logo-container" href="#" class="brand-logo"><?= Html::img('@web/img/logo_ifd_header.png', ['width'=>'80%','alt'=>Yii::$app->name,'class'=>'pull-left'])?></a>
      <ul class="right hide-on-med-and-down">      
       <?php if (Yii::$app->user->isGuest): ?>
        <li><a href="<?= Url::toRoute('/site/login')?>"><i class="material-icons left">account_circle</i>Iniciar Sesión</a></li>
       <?php else: ?>
        <li><a href="<?= Url::toRoute('/site/index')?>"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a href="<?= Url::toRoute('/alumno/legajo')?>"><i class="material-icons left">person</i>Mis Datos Personales</a></li>
        <li><a href="<?= Url::toRoute('/alumno/tramites')?>"><i class="material-icons left">description</i>Tramites</a></li>
        <li><a href="<?= Url::toRoute('/site/change-password')?>"><i class="material-icons left">settings</i>Configuración</a></li>  
        <li><?= Html::a('<i class="material-icons left">power_settings_new</i> Cerrar Sesión ('.Yii::$app->user->identity->nombreAlumno.')', Url::to(['site/logout']), ['data-method' => 'POST']) ?></li>     
       <?php endif ?>     
      </ul>

      <ul id="nav-mobile" class="side-nav">
      <?php if (Yii::$app->user->isGuest): ?>
      <li><a href="<?= Url::toRoute('/site/login')?>"><i class="material-icons left">account_circle</i>Iniciar Sesión</a></li>
      <?php else: ?>
        <li><a href="<?= Url::toRoute('/site/index')?>"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a href="<?= Url::toRoute('/alumno/legajo')?>"><i class="material-icons left">person</i>Mis Datos Personales</a></li>
        <li><a href="<?= Url::toRoute('/alumno/tramites')?>"><i class="material-icons left">description</i>Tramites</a></li>
        <li><a href="<?= Url::toRoute('/site/change-password')?>"><i class="material-icons left">settings</i>Configuración</a></li>  
        <li><?= Html::a('<i class="material-icons left">power_settings_new</i> Cerrar Sesión', Url::to(['site/logout']), ['data-method' => 'POST']) ?></li>   
      <?php endif ?>      
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>    
  </nav>
    

    <main class="container ">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="row" id="alert_box">
            <div class="col s12 m12">
                <div class="card green">
                    <div class="row">
                        <div class="col s12 m10">
                            <div class="card-content white-text">
                                <?= Yii::$app->session->getFlash('success') ?>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <button class="btn-card" id="alert_close" aria-hidden="true">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="row" id="alert_box">
            <div class="col s12 m12">
                <div class="card red darken-1">
                    <div class="row">
                        <div class="col s12 m10">
                            <div class="card-content white-text">
                                <?= Yii::$app->session->getFlash('error') ?>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <button class="btn-card" id="alert_close" aria-hidden="true">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    <?php endif; ?>
        
        <?php// Alert::widget() ?>
        <?= $content ?>
    </main>


    <footer class="page-footer teal lighten-1">    
        <div class="footer-copyright">
        <div class="container">
            © 2017 SURI      
        </div>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

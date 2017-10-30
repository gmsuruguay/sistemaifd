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

  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">      
       <?php if (Yii::$app->user->isGuest): ?>
        <li><a href="<?= Url::toRoute('/site/login')?>"><i class="material-icons left">account_circle</i>Iniciar Sesión</a></li>
       <?php else: ?>
        <li><a href="<?= Url::toRoute('/site/index')?>"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a href="<?= Url::toRoute('/alumno/legajo')?>"><i class="material-icons left">person</i>Mis Datos Personales</a></li>
        <li><a href="<?= Url::toRoute('/site/index')?>"><i class="material-icons left">description</i>Tramites</a></li>
        <li><a href="<?= Url::toRoute('/site/change-password')?>"><i class="material-icons left">settings</i>Configuración</a></li>  
        <li><?= Html::a('<i class="material-icons left">power_settings_new</i> Cerrar Sesión', Url::to(['site/logout']), ['data-method' => 'POST']) ?></li>   
       <?php endif ?>     
      </ul>

      <ul id="nav-mobile" class="side-nav">
      <?php if (Yii::$app->user->isGuest): ?>
      <li><a href="<?= Url::toRoute('/site/login')?>"><i class="material-icons left">account_circle</i>Iniciar Sesión</a></li>
      <?php else: ?>
        <li><a href="<?= Url::toRoute('/site/index')?>"><i class="material-icons left">home</i>Inicio</a></li>
        <li><a href="<?= Url::toRoute('/alumno/legajo')?>"><i class="material-icons left">person</i>Mis Datos Personales</a></li>
        <li><a href="<?= Url::toRoute('/site/index')?>"><i class="material-icons left">description</i>Tramites</a></li>
        <li><a href="<?= Url::toRoute('/site/change-password')?>"><i class="material-icons left">settings</i>Configuración</a></li>  
        <li><?= Html::a('<i class="material-icons left">power_settings_new</i> Cerrar Sesión', Url::to(['site/logout']), ['data-method' => 'POST']) ?></li>   
      <?php endif ?>      
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
    

    <main class="container ">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </main>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

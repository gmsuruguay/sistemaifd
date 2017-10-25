<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/suri.png', ['width'=>'50%','alt'=>Yii::$app->name,'class'=>'pull-left'])."SURI",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
   
    if (Yii::$app->user->isGuest) {       
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            //['label' => 'Inscripción Materias', 'url' => ['#']],
            //['label' => 'Inscripción Exámenes', 'url' => ['#']],
            ['label' => 'Historia Academica', 'url' => ['#']],
            
            $menuItems[]=[
                
                'label' => 'Trámites',
                'items' => [                 
                    ['label' => 'Mis Datos Personales', 'url' => ['/alumno/legajo']],
                    '<li class="divider"></li>',                
                    ['label' => 'Solicitud de Certificados', 'url' => ['#']],                 
                ],       
                   
            ],
            ['label' => 'Configuración', 'url' => ['/site/change-password']],
        ];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Cerrar Sesión (' . Yii::$app->user->identity->nombreAlumno . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container ">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

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

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="app-home">
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

<?php $this->beginBody() ?>

    <header class="center-align logo-inicio">
        <h2>SURI <?= Html::img('@web/img/suri.png', ['alt'=>Yii::$app->name,'class'=>'pull-left'])?></h2>
        <h5> <b>SISTEMA UNICO DE REGISTRO INSTITUCIONAL </b> </h5>
        
    </header>
        
    <main class="container">  
           
    <?= $content ?>
    </main>
   

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
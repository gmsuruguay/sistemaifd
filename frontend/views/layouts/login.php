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
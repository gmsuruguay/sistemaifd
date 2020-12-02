<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use dmstr\widgets\Alert;
/* @var $this \yii\web\View */
/* @var $content string */

//dmstr\web\AdminLteAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="content-page">

<?php $this->beginBody() ?>
<div class="container">
    <?= Alert::widget() ?>   
</div>
<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

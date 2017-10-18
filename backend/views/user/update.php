<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Username: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="user-update">   

    <?= $this->render('_formupdate', [
        'model' => $model,
        'perfil' => $perfil,
        'role'=>$role,
    ]) ?>

</div>

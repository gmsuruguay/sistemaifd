<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/activar-cuenta', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hola <?= Html::encode($user->nombreAlumno) ?>,</p>

    <p>Siga el siguiente enlace para activar su cuenta:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>

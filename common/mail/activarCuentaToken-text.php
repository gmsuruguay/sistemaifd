<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/activar-cuenta', 'token' => $user->password_reset_token]);
?>
Hola <?= $user->nombreAlumno ?>,

Siga el siguiente enlace para activar su cuenta:

<?= $resetLink ?>

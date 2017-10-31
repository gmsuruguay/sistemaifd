<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
      <div class="col s12 m12">
        <div class="card-panel red darken-1">
          <span class="white-text">
          <?= nl2br(Html::encode($message)) ?>
          </span>
        </div>
      </div>
    </div>  
    

</div>

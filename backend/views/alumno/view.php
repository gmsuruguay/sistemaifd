<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Alumno */

$this->title = 'Legajo del Alumno';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-view">

    <div class="nav-tabs-custom">
        <ul class="app-icono nav nav-tabs pull-right">          
          <li class=""><a href="#datos_academicos" data-toggle="tab" aria-expanded="false"><i class="fa  fa-briefcase"></i> Datos Academicos</a></li>
          <li class="active"><a href="#legajo" data-toggle="tab" aria-expanded="true"><i class="fa fa-file-text"></i> Datos Personales</a></li>          
          <li class="pull-left header "><i class="fa fa-user"></i> <?=$model->nombreCompleto?></li>
        </ul>
        <div class="tab-content">              
          <!-- /.tab-pane -->
          <div class="tab-pane" id="datos_academicos">
            <?php  echo $this->render('_academico', ['model'=>$model,'searchModel' => $searchModel,'dataProvider' => $dataProvider]); ?>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane active" id="legajo">
            <?php  echo $this->render('_legajo', ['model' => $model]); ?>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div> 

</div>

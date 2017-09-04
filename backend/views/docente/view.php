<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Docente */

$this->title = 'Legajo del Docente';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-view">   
    <div class="nav-tabs-custom">
        <ul class="app-icono nav nav-tabs pull-right">          
          <li class=""><a href="#historia_academica" data-toggle="tab" aria-expanded="false"><i class="fa  fa-briefcase"></i> Historia Academica</a></li>
          <li class="active"><a href="#legajo" data-toggle="tab" aria-expanded="true"><i class="fa fa-file-text"></i> Datos Personales</a></li>          
          <li class="pull-left header "><i class="fa fa-user"></i> <?=$model->apellidoNombre?></li>
        </ul>
        <div class="tab-content">              
          <!-- /.tab-pane -->
          <div class="tab-pane" id="historia_academica">
           <?php//  echo $this->render('_historia_clinica', ['model'=>$model,'searchModel' => $searchModel,'dataProvider' => $dataProvider,]); ?>
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

<?php
use yii\helpers\Url;
use common\models\ValorHelper;
use backend\models\Alumno;
use backend\models\Docente;
use backend\models\Carrera;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Inicio - Sistema';
?>
<div class="site-index">    
    <div class="body-content">             

       <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">              
              <h3><?= Alumno::Cantidad() ?></h3>
              <p>Alumnos</p>
            </div>
            <div class="icon">
            <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="<?= Url::toRoute('alumno/') ?>" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <h3><?= Docente::Cantidad() ?></h3>
              <p>Docentes</p>
            </div>
            <div class="icon">
            <i class="fa fa-user"></i>
            </div>
            <a href="<?= Url::toRoute('docente/') ?>" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <h3><?= Carrera::Cantidad() ?></h3>
              <p>Carreras</p>
            </div>
            <div class="icon">
             <i class="fa fa-certificate"></i>
            </div>
            <a href="<?= Url::toRoute('carrera/') ?>" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><i class="fa fa-pencil"></i></h3>
              <p>Usuarios</p>
            </div>
            <div class="icon">
            <i class="fa fa-users"></i>
            </div>
            <a href="<?= Url::toRoute('user/') ?>" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       </div>
       <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><i class="fa fa-plus"></i></h3>
                <p>Inscripciones</p>
              </div>
              <div class="icon">
               <i class="fa fa-pencil-square-o"></i>
              </div>
              <a href="<?= Url::toRoute('inscripcion/') ?>" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><i class="fa fa-plus"></i></h3>
                <p>Actas</p>
              </div>
              <div class="icon">
               <i class="fa fa-book"></i>
              </div>
              <a href="<?= Url::toRoute('acta/') ?>" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><i class="fa fa-plus"></i></h3>
                <p>Cursadas</p>
              </div>
              <div class="icon">
               <i class="fa fa-rocket"></i>
              </div>
              <a href="<?= Url::toRoute('cursada/') ?>" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

    </div>
</div>

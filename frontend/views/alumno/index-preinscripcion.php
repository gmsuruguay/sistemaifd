<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\FechaHelper;
use yii\bootstrap\ButtonDropdown;
use mdm\admin\components\Helper;
use backend\models\CalendarioAcademico;
use backend\models\Inscripcion;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SURI - PREINSCRIPCION';
?>
<div class="inscripcion-index">    
    
    <h3><?= Html::encode($this->title) ?></h3>

    
    
    <?php if( !Inscripcion::existePreinscripcion(Yii::$app->user->identity->idAlumno) ): ?>
        <div class="row" id="alert_box">
            <div class="col s12 m12">
                <div class="card cyan lighten-3">
                    <div class="row">
                        <div class="col s12 m10">
                            <div class="card-content white-text">
                                Por favor seleccione la carrera en la que se inscribira.
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <button class="btn-card" id="alert_close" aria-hidden="true">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

        <?= Html::a('<i class="material-icons left">school</i> ELEGIR CARRERA', ['registrar-carrera'], ['class' => 'btn waves-effect waves-light']); ?>
    
    
                   
    <?php endif; ?>
    <br>
    <?php foreach ($model as $m): ?>
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                <div class="card-content">
                    <span class="card-title"><?=$m->descripcionCarrera ?></span>
                    <p></p>
                </div>
                <div class="card-action">
                    <div class="row">
                        <div class="col m12">
                            <?php                     

                            if(Helper::checkRoute('imprimir-formulario')){
                                echo Html::a('<i class="material-icons left">local_printshop</i> Imprimir', ['imprimir-formulario', 'id' => $m->id], [
                                    'class' => 'btn waves-effect waves-light btn-large right',                  
                                    'target'=>'_blank',
                                ]);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
            
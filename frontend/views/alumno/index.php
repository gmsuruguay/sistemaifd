<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\FechaHelper;
use yii\bootstrap\ButtonDropdown;
use mdm\admin\components\Helper;
use backend\models\CalendarioAcademico;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carreras Inscriptas';
?>
<div class="inscripcion-index">    
    
    <h3><?= Html::encode($this->title) ?></h3>
    <?php foreach ($model as $m): ?>
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                <div class="card-content">
                    <span class="card-title"><?=$m->descripcionCarrera ?></span>
                    <p></p>
                </div>
                <div class="card-action">
                    <?php 
                    if (Helper::checkRoute('listar-materia') && CalendarioAcademico::estaHabilitado('CURSADA') ) {
                        echo Html::a(Yii::t('app', '<i class="material-icons left">create</i> Inscribir materia'), ['listar-materia', 'id' => $m->carrera_id], [
                            'class' => 'btn waves-effect waves-light'                            
                        ]);
                    }  
                    
                    if (Helper::checkRoute('form-inscripcion') && CalendarioAcademico::estaHabilitado('EXAMEN') ) {
                        echo Html::a(Yii::t('app', '<i class="material-icons left">create</i> Inscribir examen'), ['form-inscripcion', 'id' => $m->carrera_id], [
                            'class' => 'btn waves-effect waves-light'                            
                        ]);
                    }  
                    if(Helper::checkRoute('ver-inscripciones')){
                        echo Html::a('<i class="material-icons left">format_list_bulleted</i> Mis inscripciones', ['ver-inscripciones', 'id' => $m->id], [
                            'class' => 'btn waves-effect waves-light',                  
                            
                        ]);
                    }
                    if(Helper::checkRoute('ver-inscripciones')){
                        echo Html::a('<i class="material-icons left">format_list_bulleted</i> Mis inscripciones', ['ver-inscripciones', 'id' => $m->id], [
                            'class' => 'btn waves-effect waves-light',                  
                            
                        ]);
                    }
                    ?>
                </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
            
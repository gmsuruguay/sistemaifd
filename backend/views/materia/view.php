<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $model backend\models\Materia */

$this->title = 'Detalle de Materias Correlativas';
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['carrera/view','id' =>$model->carrera_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-view">

    <div class="box">
        <div class="box-header with-border">
            <i class="fa fa-file"></i>
            <h3 class="box-title"><?=$model->descripcion?></h3>              
        </div>

        <div class="box-body">  
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [                  
                    
                    [
                    'label'=>'Carrera',
                    'value'=>$model->descripcionCarrera,
                    ],                    
                    [
                    'label'=>'Año',
                    'value'=>$model->anioMateria,
                    ],                   
                ],
            ]) ?> 
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'class'  => 'form-horizontal',
                'action' => ['correlatividad/add'],
                ]); ?>

                 <div class="form-inlie">
                    <p>Aprobadas</p>
                    <?= Html::checkboxList('materia_id_correlativa_a', $indicesA, ArrayHelper::map($materias, 'id', 'descripcion'),['separator'=> '<br>']) ?>
                     <p>Regulares</p>
                    <?= Html::checkboxList('materia_id_correlativa_r', $indicesR, ArrayHelper::map($materias, 'id', 'descripcion'),['separator'=> '<br>']) ?>
                    <?=Html::hiddenInput('materia_id', $model->id)?>
                    <?= Html::submitButton('Actualizar', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php $form = ActiveForm::end(); ?> 
                                                            
        </div>    
    </div>
    
</div>

</div>

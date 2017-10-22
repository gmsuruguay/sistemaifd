<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignar sede a Preceptor';
$this->params['breadcrumbs'][] = 'Asignar sede';
?>
<div class="user-asignar-sede">
    
    <div class="box">

        <div class="box-header">
            <h3 class="box-title" >Preceptor:  <?= $user->perfilApellido?></h3>
        </div>
        <div class="box-body">
             <?php $form = ActiveForm::begin(['id'=>'form-sede']); ?>
                <div class='row'>
                    <div class='col-sm-8 col-md-10'>
                        <?= $form->field($model, 'sede_id')->label(false)->dropDownList(ArrayHelper::map($sedes, 'id', 'descripcion'), ['class'=> 'form-control','prompt'=>'--Seleccionar Sede--',]) ?>
                         <?= $form->field($model, 'user_id')->label(false)->hiddenInput()?>
                    </div>
                    <div class='col-sm-4 col-md-2'>
                         <?= Html::a('AGREGAR', ['user/save-sede'], ['class' => 'btn btn-success', 'id'=> 'btn-agregar']) ?>
                    </div>
                    
                </div>
                 
            <?php ActiveForm::end(); ?>
        </div>
            
        <div class="box-body">
            <?php Pjax::begin(['id'=>'grid-sedes'])?>                                    
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],            
                        [
                        'label'=> 'Sede',
                        'value'=>'sede.descripcion'
                        ],   
                        [
                        'label'=> 'Localidad',
                        'value'=> 'sede.localidad'
                        ],              
                        ['class' => 'yii\grid\ActionColumn','template' => '{delete}', 
                         'buttons' => [
                            'delete'=>function ($url, $model, $key) {
                    	                		
                                return Html::a('', ['/user/remove-sede', 'id'=>$model->id, 'user_id'=>$model->user_id], ['class' => 'glyphicon glyphicon-trash', 'title'=>'Eliminar','data' => [
                                                                                'confirm' => '¿Esta seguro eliminar esta asignación?',
                                                                                'method' => 'post',] ]);
                                
                            },
                         ],
                        ],
                    ],
                ]); ?>
            <?php Pjax::end()?>
        </div>
    </div>
</div>
<?php
$script = <<< JS

    $("#btn-agregar").on("click", function(e) {
        e.preventDefault();
        $.ajax({
           type: "POST", 
           url: $(this).attr('href'),
           data: $('#form-sede').serialize(),
           success: function(data) {
                if(data=='1')   
                {
                    $.pjax.reload('#grid-sedes');
                }
           }
        });
        return false;
    });


JS;
$this->registerJs($script)
?>
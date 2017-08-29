<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Usuario -'.' '.$model->perfilNombre.' '.$model->perfilApellido;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="box box-solid">
        <div class="box-header with-border">
              <i class="fa fa-file"></i>
              <h3 class="box-title">Datos usuario</h3>              
        </div>

        <div class="box-body">         
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'email:email',
                    'created_at:date',
                    [                      
                    'label' => 'Estado',
                    'format'=>'raw',
                    'value' => $model->status==0 ? Html::tag('span','Inactivo',['class'=> 'label label-danger']) : Html::tag('span','Activo',['class'=> 'label label-info']),
                    ],
                    [
                    'label'=> 'Nombre',
                    'value' => $model->perfilNombre,
                    ],
                    [
                    'label'=> 'Apellido',
                    'value' => $model->perfilApellido,
                    ],
                ],
            ])
            ?>
        </div>

        <div class="box-footer">
         <div class="btn-group">
         
            <?php
                if ($model->status == 0 && Helper::checkRoute('activate')) {
                    echo Html::a(Yii::t('app', '<i class="fa  fa-check"></i> Activar'), ['activate', 'id' => $model->id], [
                        'class' => 'btn btn-info',
                        'data' => [
                            'confirm' => Yii::t('app', 'Esta seguro de activar esta cuenta de usuario?'),
                            'method' => 'post',
                        ],
                    ]);
                }else{                
                
                    if (Helper::checkRoute('desactivar')) {
                        echo Html::a(Yii::t('app', '<i class="fa  fa-minus-circle"></i> Desactivar'), ['desactivar', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('yii', 'Esta seguro de desactivar esta cuenta de usuario ?'),
                                'method' => 'post',
                            ],
                        ]);
                    }

                    if (Helper::checkRoute('update')) {
                        echo Html::a(Yii::t('app', '<i class="fa  fa-pencil"></i> Editar'), ['update', 'id' => $model->id], [
                            'class' => 'btn btn-primary'                            
                        ]);
                    }
                }
            ?>
         </div>
        </div>
    </div>

</div>

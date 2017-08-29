<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\User */

$this->title = 'Datos del usuario';
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$controllerId = $this->context->uniqueId . '/';
?>
<div class="user-view">    

    <div class="box box-solid">
        <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title"><?= $model->username ?></h3>              
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
                    'label'=> 'Estado',
                    'value' => $model->Estado,
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
            <?php
                if ($model->status == 0 && Helper::checkRoute($controllerId . 'activate')) {
                    echo Html::a(Yii::t('rbac-admin', '<i class="fa  fa-check"></i> Activar'), ['activate', 'id' => $model->id], [
                        'class' => 'btn btn-info',
                        'data' => [
                            'confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                            'method' => 'post',
                        ],
                    ]);
                }
                ?>
                <?php
                if (Helper::checkRoute($controllerId . 'delete')) {
                    echo Html::a(Yii::t('rbac-admin', '<i class="fa  fa-minus-circle"></i> Eliminar'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]);
                }
            ?>
        </div>
    </div>


</div>

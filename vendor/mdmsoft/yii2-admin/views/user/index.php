<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel mdm\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    
       <p>
        <?= Html::a(Yii::t('rbac-admin', '<i class="fa  fa-plus"></i> Nuevo'), ['signup'], ['class' => 'btn btn-success']) ?>
       </p>

    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Lista de usuarios</h3>
        </div>

        <div class="box-body">
         <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'username',
                    'email:email',
                    'created_at:date',
                    [
                        'attribute' => 'status',
                        'value' => function($model) {
                            return $model->status == 0 ? 'Inactive' : 'Active';
                        },
                        'filter' => [
                            0 => 'Inactive',
                            10 => 'Active'
                        ]
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => Helper::filterActionColumn(['view', 'activate','desactivar']),
                        'buttons' => [
                            'activate' => function($url, $model) {
                                if ($model->status == 10) {
                                    return '';
                                }
                                $options = [
                                    'title' => Yii::t('rbac-admin', 'Activate'),
                                    'aria-label' => Yii::t('rbac-admin', 'Activate'),
                                    'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                            },

                            'desactivar' => function($url, $model) {
                                if ($model->status == 0) {
                                    return '';
                                }
                                $options = [
                                    'title' => Yii::t('rbac-admin', 'Desactivar'),
                                    'aria-label' => Yii::t('rbac-admin', 'Desactivar'),
                                    'data-confirm' => Yii::t('rbac-admin', 'Esta seguro de desactivar a este usuario?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ];
                                return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, $options);
                            }
                            ]
                        ],
                    ],
                ]);
                ?>
        </div>
        
    </div>
        
      

    
</div>

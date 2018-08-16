<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa  fa-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Lista de usuarios</h3>
        </div>

        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],            
                    'username',  
                    [
                    'attribute'=>'apellido_perfil',
                    'label'=>'Apellido',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->perfilApellido;
                    }
                    ], 

                    [
                    'attribute'=>'nombre_perfil',
                    'label'=>'Nombre',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->perfilNombre;
                    }
                    ], 
                   
                    [
                    'attribute'=>'status',
                    'label'=>'Estado',
                    'filter' => ['0'=>'Inactivo', '10'=>'Activo'],
                    'format'=>'raw',
                    'value'=>function($data){
                        if ($data->status==0) {
                            return Html::tag('span','Inactivo',['class'=> 'label label-danger']);
                        }
                        return Html::tag('span','Activo',['class'=> 'label label-info']);
                        
                    }
                    ],
                    

                    ['class' => 'yii\grid\ActionColumn','template' => '{view} {permisos} {reset}', 
                     'buttons' => [



                        'permisos'=>function ($url, $model, $key) {
                	        return $model->status==10 ?        		
                            Html::a('', ['/admin/assignment/view', 'id'=>$model->id], ['class' => 'glyphicon glyphicon-lock', 'title'=>'Permisos'])
                            :'';
                        },

                        'reset'=>function ($url, $model, $key) {
                	                		
                            return $model->status==10 ?
                            Html::a('', ['blanquear', 'id'=>$model->id], 
                            [
                                'class' => 'glyphicon glyphicon-repeat', 
                                'data' => [
                                    'confirm' => 'Esta seguro de blanquear la contraseña ?',
                                    'method' => 'post',
                                ],
                                'title'=>'Blanquear clave'
                            ])

                            :'';
                            
                        },

                        /*'sede'=>function ($url, $model, $key) {
                                            
                            return $model->isPreceptor?Html::a('<i class="fa fa-university" aria-hidden="true"></i>', ['/user/asignar-sede', 'id'=>$model->id], ['title'=>'Asignar sede']):'';
                            
                        },*/
                     ],
                    
                    
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */
/* @var $form yii\widgets\ActiveForm */
?>

<?= GridView::widget([
                'dataProvider' => $notas,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nro_permiso',
                    [
                    'label'=> 'Apellido y Nombre',
                    'value'=> function ($data){
                            return $data->alumno->nombreCompleto;
                        }
                    ],
                    [
                    'label'=> 'Dni',
                    'value'=> function ($data){
                            return $data->alumno->numero;
                        }
                    ],
                    
                    'nota',

                    ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}',
                     /*'buttons' => [
                        'delete'=>function ($url, $model, $key) {
                                            
                            return Html::a('', ['/acta/delete-record', 'id'=>$model->id], ['class' => 'btn-eliminar fa fa-trash fa-6', 'title'=>'Borrar']);
                            
                            },
                        ]*/
                    ]
                ]
    ]); 
?>

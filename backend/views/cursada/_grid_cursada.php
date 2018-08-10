 <?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */
/* @var $form yii\widgets\ActiveForm */
?>


 <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                    'label'=> 'Alumno',
                    'value'=> function ($data){
                            return $data->alumno->nombreCompleto;
                        }
                    ],                  
                    
                    'nota',
                    [
                    'label'=> 'Condicion',
                    'value'=> function ($data){
                            return $data->condicion->descripcion;
                        }
                    ], 

                    ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}',
                     'buttons' => [
                        'delete'=>function ($url, $model, $key) {
                                            
                            return Html::a('', ['/cursada/delete-auto', 'id'=>$model->id], ['class' => 'btn-eliminar fa fa-trash fa-6', 'title'=>'Borrar', 'id'=> 'btn-eliminar-registro']);
                            
                            },
                        ]
                    ]
                ]
            ]); 
        ?>

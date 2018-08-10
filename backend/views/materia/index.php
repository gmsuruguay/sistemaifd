<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MateriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-index">
<?=$this->render('_search', ['model' => $searchModel])?>
<div class="box">

        <div class="box-header">
            <h3 class="box-title">Listado de Materias</h3>
        </div>

        <div class="box-body">               
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataProvider,                    
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'descripcion',
                        [
                        'attribute'=>'carrera_id',
                        'value'=>function($data){
                            return $data->descripcionCarrera;
                        }
                        ],
                        [
                        'attribute'=>'anio',
                        'value'=>function($data){
                            return $data->anioMateria;
                        }
                        ],
                        [
                        'attribute'=>'estado',
                        'value'=>function($data){
                            return $data->estadoMateria;
                        }
                        ],

                        ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{view}')],
                    ],
                ]); ?>
            <?php Pjax::end(); ?></div>
        </div>
</div>
 

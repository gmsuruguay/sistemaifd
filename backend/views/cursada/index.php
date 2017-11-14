<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Cursada;
use yii\helpers\Url;
use common\models\FechaHelper;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CursadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursada-index">
    <?=$this->render('_search', ['model' => $searchModel])?>
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Listado de Inscripciones</h3>  
                      
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,               
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],                                  
                   
                    'materia', 
                    'cant',

                    ['class' => 'yii\grid\ActionColumn', 'template' => Helper::filterActionColumn('{detalle}'),
                    'buttons' => [
                        
                        'detalle' => function ($url,$model,$key) {
                                return Html::a('Action', ['listar','id'=>$model['id']]);
                        },
                    ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
   
</div>

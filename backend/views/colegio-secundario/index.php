<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ColegioSecundarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colegios Secundarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colegio-secundario-index">
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Lista de Colegios</h3>
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
            </div> 
        </div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    
                    'descripcion',

                    ['class' => 'yii\grid\ActionColumn',
                     'template' => Helper::filterActionColumn('{update} {delete}'),
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

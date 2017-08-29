<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LocalidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Localidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localidad-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::a('<i class="fa  fa-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">

        <div class="box-header">
            <i class="fa fa-map-marker"></i>
            <h3 class="box-title">Lista de localidades</h3>
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

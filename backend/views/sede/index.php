<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SedeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sedes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sede', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cue',
            'descripcion',
            'secretario_academico',
            'rector',
            // 'vice_rector',
            // 'direccion',
            // 'localidad',
            // 'logo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

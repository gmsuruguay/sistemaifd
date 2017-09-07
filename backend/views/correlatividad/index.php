<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CorrelatividadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Correlatividads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correlatividad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Correlatividad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'materia_id',
            'materia_id_correlativa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

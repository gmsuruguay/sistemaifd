<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CursadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursada-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cursada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha_inscripcion',
            'condicion_id',
            'alumno_id',
            'materia_id',
            // 'nota',
            // 'fecha_vencimiento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

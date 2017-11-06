<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CalendarioExamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendario Examens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-examen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Calendario Examen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'carrera_id',
            'materia_id',
            'fecha_examen',
            'hora',
            // 'aula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

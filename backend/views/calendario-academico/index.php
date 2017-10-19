<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CalendarioAcademicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendario Academicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendario-academico-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Calendario Academico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha_desde',
            'fecha_hasta',
            'tipo_inscripcion',
            'actividad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

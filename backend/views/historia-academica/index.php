<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\HistoriaAcademicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historia Academicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historia-academica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Historia Academica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha_inscripcion',
            'alumno_id',
            'materia_id',
            'condicion_id',
            // 'libro',
            // 'folio',
            // 'fecha',
            // 'nota',
            // 'asistencia',
            // 'tipo_inscripcion',
            // 'fecha_vencimiento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

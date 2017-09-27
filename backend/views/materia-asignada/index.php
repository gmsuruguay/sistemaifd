<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materia Asignadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-asignada-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Materia Asignada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha_alta',
            'docente_id',
            'materia_id',
            'fecha_baja',
            'materia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionMateriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripcion Materias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-materia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inscripcion Materia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha_inscripcion',
            'alumno_id',
            'materia_id',
            'nota',
            // 'fecha',
            // 'nro_acta',
            // 'condicion_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

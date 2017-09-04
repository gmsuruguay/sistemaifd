<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alumno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nro_legajo',
            'tipo_doc',
            'numero',
            'cuil',
            // 'apellido',
            // 'nombre',
            // 'sexo',
            // 'estado_civil',
            // 'nacionalidad',
            // 'fecha_nacimiento',
            // 'lugar_nacimiento_id',
            // 'domicilio',
            // 'nro',
            // 'localidad_id',
            // 'telefono',
            // 'celular',
            // 'email:email',
            // 'fecha_baja',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

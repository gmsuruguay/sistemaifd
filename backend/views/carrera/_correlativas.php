<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CorrelatividadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="correlatividad-index">
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'materia_id_correlativa',
           
        ],
    ]); ?>
</div>
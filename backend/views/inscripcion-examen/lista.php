<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Cursada;
use yii\helpers\Url;
use common\models\FechaHelper;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CursadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imprimir listado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listado-index">
    <?=$this->render('_buscar')?>
          
        
    <div id="respuesta"></div>       
    
   
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $model backend\models\Localidad */

$this->title ='Detalle localidad';
$this->params['breadcrumbs'][] = ['label' => 'Localidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localidad-view">

    <div class="box">
        <div class="box-header with-border">
              <i class="fa fa-map-marker"></i>
              <h3 class="box-title">Datos localidad</h3>              
        </div>

        <div class="box-body">  

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'descripcion',
                ],
            ]) ?>            
        </div>
        <div class="box-footer">            
                <?php 
                 if (Helper::checkRoute('update')) {
                        echo Html::a(Yii::t('app', '<i class="fa  fa-pencil"></i> Editar'), ['update', 'id' => $model->id], [
                            'class' => 'btn btn-primary'                            
                        ]);
                    }
                ?>
        </div> 
    </div>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $model backend\models\Autoridades */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Autoridades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autoridades-view">

    <div class="box">
        <div class="box-header with-border">                        
              <div class="pull-right">
              <?php
                if (Helper::checkRoute('update')) {
                    echo Html::a(Yii::t('app', '<i class="fa  fa-pencil"></i> Editar'), ['update', 'id' => $model->id], [
                        'class' => 'btn btn-primary'                            
                    ]);
                }
              ?>
              </div>            
        </div>

        <div class="box-body">  
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [               
                'rector',
                'secretario_academico',
                'vice_rector',
            ],
            ]) ?>     
        </div>
    </div> 


</div>

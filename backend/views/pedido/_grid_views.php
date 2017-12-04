<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\FechaHelper;

?>            

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="pill" href="#pag_uno">Constancias</a></li>
                <li><a data-toggle="pill" href="#pag_dos">Analiticos</a></li>
            </ul>

            <div class="tab-content">
              <div id="pag_uno" class="tab-pane fade in active">
                <h3>Constancias</h3>
                <div class="pull-right">
                    <?= $constancias->getCount()>0?Html::a('<i class="fa  fa-print"></i> Imprimir', ['print','tipo'=>'c','carrera_id'=>$carrera_id, 'estado'=>$impreso, 'fecha'=>$fecha], ['class' => 'btn btn-primary btn-imprimir']):'' ?>
                </div> 
                
                <?= GridView::widget([
                    'dataProvider' => $constancias,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                         ['label'=> 'Apellido y Nombre',
                         'value' => 'alumno.nombreCompleto'],
                        'cantidad',
                        ['label'=>'Fecha de Pedido',
                        'value'=> function($data){
                        return FechaHelper::fechaDMY($data->fecha_pedido);
                        }],
                        
                    ],
                ]); ?>
               
              </div>
              <div id="pag_dos" class="tab-pane fade">
                <h3>Analíticos</h3>
                <div class="pull-right">
                    <?= $analiticos->getCount()>0?Html::a('<i class="fa  fa-print"></i> Imprimir', ['print','tipo'=>'a','carrera_id'=>$carrera_id,'estado'=>$impreso, 'fecha'=>$fecha], ['class' => 'btn btn-primary btn-imprimir', 'id'=> '']):'' ?>
                </div> 
                
                <?= GridView::widget([
                    'dataProvider' => $analiticos,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['label'=> 'Apellido y Nombre',
                         'value' => 'alumno.nombreCompleto'],
                        'cantidad',
                        ['label'=>'Fecha de Pedido',
                        'value'=> function($data){
                        return FechaHelper::fechaDMY($data->fecha_pedido);
                        }],
                       
                    ],
                ]); ?>
                
              </div>
            </div>
           
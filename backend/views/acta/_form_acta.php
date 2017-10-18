<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\FechaHelper;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\ActaExamen */

?>

<div class="acta-examen-view">
  
        <div class="box-header with-border">            
           <h3 class="box-title">Acta de Exámen</h3> 
           <div class="pull-right">
               <?= Html::a('<i class="fa  fa-close fa-lg"></i>', '', ['id'=> 'btn-cancelar-notas']) ?> 
            </div>                      
        </div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'libro',
                    'folio',
                    [
                        'label'=> 'Fecha de Examen',
                        'value'=> function ($data){
                                return FechaHelper::fechaDMY($data->fecha_examen);
                            }
                    ],
                    [
                        'label'=> 'Condicion',
                        'value'=> function ($data){
                                return $data->condicion->descripcion;
                            }
                    ],
                    [
                        'label'=> 'Materia',
                        'value'=> function ($data){
                                return $data->materia->descripcion;
                            }
                    ],
                        ],
            ]) ?>
           
        </div>
        
        <div class="box-body">
            <div class="pull-right">
            <?php echo $dataProvider[0]->className() == 'backend\models\Acta'?Html::a('<i class="fa  fa-lock fa-lg"></i>', '', ['id' => 'btn-desbloquear','data-id'=>'1']).
                                                                 Html::a('<i class="fa  fa-trash fa-lg"></i>', ['destroyed-notas'], ['id' => 'btn-eliminar']) :'';?>
            </div>  
            
            <?php $form = ActiveForm::begin([
                'enableClientValidation'=> false,
                'id'=> 'form-acta',
                ]); ?>
                <?= $form->field($model, 'libro')->label(false)->hiddenInput() ?>

                <?= $form->field($model, 'folio')->label(false)->hiddenInput() ?>

                <?= $form->field($model, 'fecha_examen')->label(false)->hiddenInput() ?>

                <?= $form->field($model, 'condicion_id')->label(false)->hiddenInput()?>

                <?= $form->field($model, 'materia_id')->label(false)->hiddenInput() ?>
                
                <table class='table' id='table-notas'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>APELLIDO Y NOMBRE</th>
                            <th>DNI </th>
                            <th width="74">NOTA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i=1;
                        foreach ($dataProvider as $dp)
                        {
                            echo '<tr>';
                            echo '<td>'.$i.'</td>';
                            echo '<td>'.$dp->alumno->apellido.'</td>';
                            echo '<td class="editable">'.$dp->alumno->numero.'</td>';
                            if($dp->className() == 'backend\models\Acta')
                            {
                               echo '<td class="editable" >'.Html::input('text', 'nota[]', $dp->nota, ['class' => 'form-control txt-input',
                                                                                                       'maxlength'=> '4',
                                                                                                       'readonly'=>'readonly']).
                                Html::hiddenInput('alumno_ids[]', $dp->alumno_id).'</td>';
                            }
                            else
                            {
                                echo '<td class="editable" >'.Html::input('text', 'nota[]', '', ['class' => 'form-control',
                                                                                                                        'maxlength'=> '4']).
                                Html::hiddenInput('alumno_ids[]', $dp->alumno_id).'</td>';
                            }
                            
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php ActiveForm::end(); ?>
        
            <div class="pull-right">
                <?php echo $dp->className() != 'backend\models\Acta'? Html::a('GUARDAR', ['save-notas'], ['class' => 'btn btn-success btn-sm', 'id'=> 'btn-guardar-notas']):
                                                                 Html::a('ACTUALIZAR', ['update-notas'], ['class' => 'btn btn-success btn-sm', 'id'=> 'btn-actualizar-notas']);?> 
            </div>
        </div>
</div>

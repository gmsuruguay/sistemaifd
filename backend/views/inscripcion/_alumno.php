<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\FechaHelper;
use mdm\admin\components\Helper;
?>
<?= DetailView::widget([
        'model' => $alumno,
        'attributes' => [
            'id',           
            'tipo_doc',
            'numero',
            'cuil',
            'apellido',
            'nombre',
            'sexo',
            'estado_civil',
            'nacionalidad',
            [
            'label'=>'Fecha Nacimiento',
            'value'=>function ($data){
                    return FechaHelper::fechaDMY($data->fecha_nacimiento);
                }
            ], 
            [
            'label'=>'Lugar Nacimiento',
            'value'=>$alumno->descripcionLocalidadNacimiento,
            ],
            'domicilio',
            'nro',
            [
            'label'=>'Localidad',
            'value'=>$alumno->descripcionLocalidad,
            ],
            'telefono',
            'celular',
            'email:email',
            [
            'label'=>'Titulo',
            'value'=>$alumno->descripcionTitulo,
            ],
            [
            'label'=>'Colegio',
            'value'=>$alumno->descripcionColegio,
            ],
            'fecha_baja',
            //'user_id',
        ],
    ]) ?>
<div class="btn-group">
        <?php             
            
                
                if (Helper::checkRoute('/alumno/update-alumno')) {
                    echo Html::a(Yii::t('app', '<i class="fa  fa-pencil"></i> Editar'), ['/alumno/update-alumno', 'id' => $alumno->id,'cod'=>$model->id], [
                        'class' => 'btn btn-primary'                            
                    ]);
                }  
                              
                
         
        ?>
</div>

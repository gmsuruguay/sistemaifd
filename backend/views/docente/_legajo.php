<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use common\models\FechaHelper;

?>
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nro_legajo',
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
            'lugar_nacimiento_id',
            'domicilio',
            'nro',
            'localidad_id',
            'telefono',
            'celular',
            'email:email',
            'fecha_baja',
            //'user_id',
        ],
    ]) ?>
<div class="btn-group">
        <?php             
            
                
                if (Helper::checkRoute('update')) {
                    echo Html::a(Yii::t('app', '<i class="fa  fa-pencil"></i> Editar'), ['update', 'id' => $model->id], [
                        'class' => 'btn btn-primary'                            
                    ]);
                }  
                              
                
         
        ?>
</div>



    
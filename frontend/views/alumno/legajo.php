<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\FechaHelper;
use mdm\admin\components\Helper;

$this->title = 'Datos Personales';
?>

<h1><?= Html::encode($this->title) ?></h1>
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [                   
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
            'value'=>$model->descripcionLocalidadNacimiento,
            ],
            'domicilio',
            'nro',
            [
            'label'=>'Localidad',
            'value'=>$model->descripcionLocalidad,
            ],
            'telefono',
            'celular',
            'email:email',
            [
            'label'=>'Titulo',
            'value'=>$model->descripcionTitulo,
            ],
            [
            'label'=>'Colegio',
            'value'=>$model->descripcionColegio,
            ],           
        ],
    ]) ?>
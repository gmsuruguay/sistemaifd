<?php

namespace backend\controllers;

use Yii;
use backend\models\Pedido;
use backend\models\Alumno;
use backend\models\Acta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use common\models\FechaHelper;
//use yii\widgets\Pjax;
/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
{
    /**
     * @inheritdoc
     */
    /*public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

    public function actionCargarFecha($carreraId, $impreso)
    {
        $fechas= Pedido::find()
                            ->where(['carrera_id'=> $carreraId, 'estado'=> $impreso])
                            ->groupBy(['fecha_pedido'])
                            ->orderBy(['fecha_pedido'=>SORT_ASC])
                            ->all();
        echo '<option value="">---Selecciona fecha---</option>';
        foreach ($fechas as $f)
        {
            echo '<option value="'.$f->fecha_pedido.'">'.FechaHelper::fechaDMY($f->fecha_pedido).'</option>';
        }
    }

    /**
     * 
     * @return mixed
     */
    public function actionIndex($impreso = '0')
    {
         if(Yii::$app->request->isAjax)
        {
            if(Yii::$app->request->post('fecha') == ''){
                $constancias = new ActiveDataProvider([
                    'query' => Pedido::find()->where(['estado'=>$impreso,'tipo'=> 'c', 'carrera_id'=>Yii::$app->request->post('carrera')]),
                ]);

                $analiticos = new ActiveDataProvider([
                    'query' => Pedido::find()->where(['estado'=>$impreso, 'tipo'=>'a', 'carrera_id'=>Yii::$app->request->post('carrera')]),
                ]);
            }
            else{
                $constancias = new ActiveDataProvider([
                    'query' => Pedido::find()->where(['estado'=>$impreso,'tipo'=> 'c', 'carrera_id'=>Yii::$app->request->post('carrera'), 'fecha_pedido'=>Yii::$app->request->post('fecha')]),
                ]);

                $analiticos = new ActiveDataProvider([
                    'query' => Pedido::find()->where(['estado'=>$impreso, 'tipo'=>'a', 'carrera_id'=>Yii::$app->request->post('carrera'),'fecha_pedido'=>Yii::$app->request->post('fecha')]),
                ]);
            }
           

            return $this->renderPartial('_grid_views', [
                'constancias' => $constancias,
                'analiticos'=> $analiticos,
                'carrera_id'=>Yii::$app->request->post('carrera'),
                'fecha'=> Yii::$app->request->post('fecha'),
                'impreso'=> $impreso,
            ]);  
        }
        else{
        $constancias = new ActiveDataProvider([
            'query' => Pedido::find()->where(['estado'=>'0','tipo'=> 'm']),
        ]);

        $analiticos = new ActiveDataProvider([
            'query' => Pedido::find()->where(['estado'=>'0', 'tipo'=>'m']),
        ]);
        return $this->render('index', [
            'constancias' => $constancias,
            'analiticos'=> $analiticos,
            'carrera_id'=>'',
            'fecha'=> '',
            'impreso'=> $impreso,
            ]);
        }
    }
    

    public function actionPrint($tipo, $carrera_id, $estado, $fecha)
    {
        $mes=FechaHelper::obtenerMes(date('Y-m-d'));
        $pdf = new Pdf([
            'marginTop'=> '12', 
            'marginBottom'=> '0', 
            'marginFooter'=>'0',       
        ]);        
        
        $pdf = $pdf->api;     
        $pdf->title="Constancias";   
        $stylesheet = file_get_contents('css/reporte.css');
        $pdf->WriteHTML($stylesheet,1);

        if($tipo == 'c')
        { 
            if($fecha=='')
            {
                $constancias = Pedido::find()->where(['estado'=>'0','tipo'=> 'c', 'carrera_id'=>$carrera_id, 'estado'=> $estado])->all();
            }
            else{
                $constancias = Pedido::find()->where(['estado'=>'0','tipo'=> 'c', 'carrera_id'=>$carrera_id, 'estado'=> $estado, 'fecha_pedido'=>$fecha])->all();
            }
            $length = count($constancias);
            $paginador = 1;
            foreach($constancias as $c) {
                $model= Pedido::findOne($c->id);
                $model->estado = '1';                
                $model->save();               
                        
                if($c->cantidad > 1)
                {
                    $length = $length + $c->cantidad  - 1;
                    for($j=0;$j<$c->cantidad ;$j++)
                    {
                        $pdf->WriteHTML($this->renderPartial('_constancia', [
                                                'c' =>$c,
                                                'mes'=>$mes,]));
                        if($paginador != $length)
                        {
                             if($paginador % 2 == 0)
                                {
                                    $pdf->AddPage();
                                }
                                else
                                {
                                    $pdf->WriteHTML('<hr>');
                                }
                                $paginador++;
                        }   
                    }
                }
                else
                {
                    $pdf->WriteHTML($this->renderPartial('_constancia', [
                                                'c' =>$c,
                                                'mes'=>$mes,]));
                    if($paginador != $length)
                    {
                         if($paginador % 2 == 0)
                            {
                                $pdf->AddPage();
                            }
                            else
                            {
                                $pdf->WriteHTML('<hr>');
                            }
                            $paginador++;
                    }        
                }
               
            }
            return $pdf->Output();
        }
        else
        {
            if($fecha=='')
            {
                $analiticos = Pedido::find()->where(['estado'=>'0', 'tipo'=>'a','carrera_id'=>$carrera_id, 'estado'=> $estado])->all();
            }
            else{
                $analiticos = Pedido::find()->where(['estado'=>'0', 'tipo'=>'a','carrera_id'=>$carrera_id, 'estado'=> $estado, 'fecha_pedido'=>$fecha])->all();
            }
            $length = count($analiticos);
            $paginador = 1;
            foreach($analiticos as $a) {
                $query = Acta::find()
                         ->joinWith(['materia'])
                         ->where(['alumno_id' => $a->alumno_id])                
                         ->andWhere(['asistencia'=>1])                            
                         ->andWhere(['materia.carrera_id' => $a->carrera_id])
                         ->orderBy('materia.anio')
                         ->all();
                $promedio=Alumno::getPromedio($query);
                if($a->cantidad > 1)
                {
                    $length = $length + $a->cantidad  - 1;
                    for($j=0;$j<$a->cantidad ;$j++)
                    {
                        $pdf->WriteHTML($this->renderPartial('_analitico', [
                            'model' => $a,
                            'analitico' => $query,
                            'promedio'=>$promedio,
                            'mes'=>$mes            
                        ]));
                        
                        if($paginador != $length)
                        {
                            $pdf->AddPage();
                            $paginador++;
                        }   
                    }
                    continue;
                }
                
                $pdf->WriteHTML($this->renderPartial('_analitico', [
                    'model' => $a,
                    'analitico' => $query,
                    'promedio'=>$promedio,
                    'mes'=>$mes            
                ]));
                if($paginador != $length)
                { 
                    $pdf->AddPage();
                    $paginador++;
                }  
                $a->estado = '1';
                $a->save();              
            }
            return $pdf->Output();
        }
    }

    /**
     * Displays a single Pedido model.
     * @param integer $id
     * @return mixed
     */
  /*  public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedido();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

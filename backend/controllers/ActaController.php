<?php

namespace backend\controllers;

use Yii;
use backend\models\Acta;
use backend\models\Materia;
use backend\models\Alumno;
use backend\models\InscripcionExamen;
use backend\models\Cursada;
use backend\models\search\ActaSearch;
use backend\models\search\ActaInscripcionExamenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\base\Exception;
use common\models\FechaHelper;
use backend\models\CalendarioExamen;
use yii\db\Query;
use yii\helpers\Html;
use backend\models\Inscripcion;

/**
 * ActaController implements the CRUD actions for Acta model.
 */
class ActaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Acta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //Lista las inscripciones a examen
    /*public function actionListarInscripciones()
    {      
        return $this->render('lista');
    }  
    
    public function actionListarFecha($cod){

        $fechas= CalendarioExamen::find()->where(['materia_id'=>$cod])->orderBy('fecha_examen')->all();

        echo '<option value="">---Selecciona fecha---</option>';
        foreach ($fechas as $f)
        {
            echo '<option value="'.$f->fecha_examen.'">'.FechaHelper::fechaDMY($f->fecha_examen).'</option>';
        }

    }

    public function actionConsultar($cod,$fecha)
    {  
       $activo=1; 
       $sql='SELECT m.id,m.descripcion as materia , COUNT(i.materia_id) AS cant FROM inscripcion_examen as i JOIN materia as m on m.id=i.materia_id WHERE i.materia_id=:materia AND i.fecha_examen=:fecha_examen AND i.estado=:estado GROUP BY m.id,materia';
       $materia= \Yii::$app->db->createCommand($sql);
       $materia->bindValue(':materia', $cod);
       $materia->bindValue(':fecha_examen', $fecha);
       $materia->bindValue(':estado', $activo);
       $html = '<div class="box">';
       $html .='<div class="box-body">';
       $html .= '<table class="table table-condensed">';
       $html .='<tbody>';
       $html .='<tr>';       
       $html .='<th>Materia</th>';                      
       $html .='<th>Cantidad Alumnos</th>';
       $html .='<th></th>'; 
       $html .='</tr>';
       if($model=$materia->queryAll()){
        //echo json_encode($model);
        foreach ($model as $value) {
            $html .='<tr>';
            $html .= Html::tag('td', $value['materia']);
            $html .= Html::tag('td', $value['cant']);   
            $html .= '<td><a href="#"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a></td>';         
            $html .='</tr>';
        }
        $html .='</tbody>';
        $html .='</table>';
        $html .='</div>';
        $html .='</div>';
        echo $html;
       }else{
           echo 'No se encontraron resultados.';
       }      
     
    }*/
    /**
     * Displays a single Acta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Acta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Acta();
        $model->scenario='load';

        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['load', 
                                            'libro' => $model->libro, 
                                            'folio' => $model->folio,
                                            'fecha_examen'=> $model->fecha_examen,
                                            'condicion_id'=>$model->condicion_id,
                                            'materia_id'=>$model->materia_id,
                                            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Acta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($libro='0', $folio='0')
    {
        $model = Acta::findOne(['libro' => $libro,
                                'folio'=> $folio,
            ]);
        if(!$model)
        {
            return $this->redirect(['create']);
        }

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $modelFind = Acta::find()->where(['libro' => Yii::$app->request->post('ant_libro'),
                                'folio'=> Yii::$app->request->post('ant_folio'),
                ])->all();
            //return print_r($model->libro);
            foreach ($modelFind as $m) {
               $m->libro        =  $model->libro;
               $m->folio        =  $model->folio;
               $m->fecha_examen =  $model->fecha_examen;
               $m->condicion_id =  $model->condicion_id;
               $m->materia_id   =  $model->materia_id;
               $m->save();
            }
            return $this->redirect(['load', 
                                            'libro' => $model->libro, 
                                            'folio' => $model->folio,
                                            'fecha_examen'=> $model->fecha_examen,
                                            'condicion_id'=>$model->condicion_id,
                                            'materia_id'=>$model->materia_id,
                                            ]);
        } else {
            $materias = Materia::find()->where(['carrera_id'=> $model->materia->carrera->id])->all();
            return $this->render('update', [
                'model' => $model,
                'materias'=> $materias,
            ]);
        }
    }

    /**
     * Deletes an existing Acta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();

         return $this->redirect(['load', 
                                            'libro' => $model->libro, 
                                            'folio' => $model->folio,
                                            'fecha_examen'=> $model->fecha_examen,
                                            'condicion_id'=>$model->condicion_id,
                                            'materia_id'=>$model->materia_id,
                                            ]);
    }

    public function actionDeleteFromIndex($id)
    {
       $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDestroyed($libro='0', $folio='0')
    {
        $model = Acta::find()->where(['libro' => $libro,
                                       'folio'=> $folio,
            ])->all();

        foreach ($model as $m) {
                $m->delete();
        }

        return $this->redirect(['create']);
    }

    /**
     * Finds the Acta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Acta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Acta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangeCarrera($carreraId)
    {
        $materias= Materia::find()
                            ->where(['carrera_id'=> $carreraId])
                            ->all();
        echo '<option>--------------</option>';
        foreach ($materias as $m)
        {
            echo '<option value="'.$m->id.'">'.$m->descripcion.'</option>';
        }
    }

    public function actionBuscarAlumno()
    {
        if(Yii::$app->request->post())
        {
            $alumno = Alumno::findOne(['numero'=> Yii::$app->request->post('dni')]);

            if(!$alumno)
            {
                return '{"alumno_id": "0", "nombre":"No se encontro al alumno."}';
            }
            
            return '{"alumno_id": "'.$alumno->id.'", "nombre":"'.$alumno->apellido.' '.$alumno->nombre.'"}'; 
        }
        return '{"alumno_id": "0", "nombre":"Error."}';
    }

     public function actionLoad($libro='0', $folio='0', $fecha_examen='0', $condicion_id='0', $materia_id='0')
    {
        $model = new Acta();

        if ($model->load(Yii::$app->request->post())) {
            if($model->nota > 0){
                $model->asistencia=1;
            }else{
                $model->asistencia=0;
            }

            $model->save();
            $notas = new ActiveDataProvider([
                'query' => Acta::find()->where(['libro' => $model->libro, 'folio'=> $model->folio]),
            ]);
           return $this->renderPartial('_grid_notas', ['notas' => $notas]);

           
        }else{
            $model->libro = $libro;
            $model->folio = $folio;
            $model->fecha_examen = $fecha_examen;
            $model->condicion_id = $condicion_id;
            $model->materia_id = $materia_id;
            $notas = new ActiveDataProvider([
                'query' => Acta::find()->where(['libro' => $model->libro, 
                                                    'folio'=> $model->folio,
                                                    'fecha_examen'=>  FechaHelper::fechaYMD($model->fecha_examen),
                                                    'condicion_id'=> $model->condicion_id,
                                                    'materia_id'=> $model->materia_id])]);

            $_grid_notas = $this->renderPartial('_grid_notas', ['notas' => $notas],true);
            
            return $this->render('load', ['model' => $model ,'grid_notas' => $_grid_notas]);
        }
    }

    public function actionLoadFromInscripto()
    {

        $model = new Acta();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            if($model->condicion_id != '2')
            {
                $query =  Acta::find()->where(['libro' => $model->libro, 
                                                    'folio'=> $model->folio,
                                                    'fecha_examen'=> FechaHelper::fechaYMD($model->fecha_examen),
                                                    'condicion_id'=> $model->condicion_id,
                                                    'materia_id'=> $model->materia_id])->all();
                if(count($query)>0)
                {
                    return  $this->renderPartial('_form_acta', ['model' => $model ,'dataProvider' => $query], true);
                }
                $query =  InscripcionExamen::find()->where(['fecha_examen'=> FechaHelper::fechaYMD($model->fecha_examen),
                                                'condicion_id'=> $model->condicion_id,
                                                'materia_id'=> $model->materia_id])->all();

                if(count($query)>0)
                {
                    return  $this->renderPartial('_form_acta', ['model' => $model ,'dataProvider' => $query], true);
                }
                return '0';
            }
            else
            {
                $query =  Acta::find()->where(['libro' => $model->libro, 
                                                    'folio'=> $model->folio,
                                                    'fecha_examen'=> FechaHelper::fechaYMD($model->fecha_examen),
                                                    'condicion_id'=> $model->condicion_id,
                                                    'materia_id'=> $model->materia_id])->all();
                if(count($query)>0)
                {
                    return  $this->renderPartial('_form_acta_prom', ['model' => $model ,'dataProvider' => $query], true);
                }
                $query =  Cursada::find()->where(['fecha_cierre'=> FechaHelper::fechaYMD($model->fecha_examen),
                                                'condicion_id'=> $model->condicion_id,
                                                'materia_id'=> $model->materia_id])->all();

                if(count($query)>0)
                {
                    return  $this->renderPartial('_form_acta_prom', ['model' => $model ,'dataProvider' => $query], true);
                }
                return '0';
            }
            return '0';

        } else {
            return $this->render('acta_desde_inscriptos', [
                'model' => $model,
            ]);
        }
    }

    public function actionSaveNotas()
    {
        return $this->saveNotas('_form_acta');
    }

    public function actionSaveNotasProm()
    {
        return $this->saveNotas('_form_acta_prom');
    }

    private function saveNotas($view)
    {
        $model = new Acta();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) 
        {
            $ids = Yii::$app->request->post('alumno_ids');
            $notas = Yii::$app->request->post('nota');
            $long = count($notas);

            //Comprueba si estan correctos los datos ingresados.
            for ($i=0; $i< $long; $i++) {
               $model->nota = $notas[$i];
               $model->alumno_id = $ids[$i];

               if(!$model->validate())
               {
                    return '0';
                    break;

               }
            }

            //Comprueba que no se dupliquen las actas.
            for ($i=0; $i< $long; $i++) {
               $model->nota = $notas[$i];
               $model->alumno_id = $ids[$i];
               $query =  Acta::find()->where([  'libro' => $model->libro, 
                                                'folio'=> $model->folio,
                                                'fecha_examen'=> $model->fecha_examen,
                                                'condicion_id'=> $model->condicion_id,
                                                'materia_id'=> $model->materia_id,
                                                'alumno_id'=> $model->alumno_id])->all();
                if(count($query)>0)
                {
                    return  '1';
                    break;
                }

            }

            //Guarda los datos en la base de datos.
            for ($i=0; $i< $long; $i++) {

               $model = new Acta();
               $model->load(Yii::$app->request->post());
               if($notas[$i] > 0){
                    $model->asistencia=1;
                }else{
                    $model->asistencia=0;
                }
               $model->nota = $notas[$i];
               $model->alumno_id = $ids[$i];
               $model->save();
            }
            $query =  Acta::find()->where(['libro' => $model->libro, 
                                                    'folio'=> $model->folio,
                                                    'fecha_examen'=> $model->fecha_examen,
                                                    'condicion_id'=> $model->condicion_id,
                                                    'materia_id'=> $model->materia_id])->all();
            return  $this->renderPartial($view, ['model' => $model ,'dataProvider' => $query], true);
        }
    }

    public function actionUpdateNotas()
    {
        $model = new Acta();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) 
        {
            $ids = Yii::$app->request->post('alumno_ids');
            $notas = Yii::$app->request->post('nota');
            $long = count($notas);

            //Comprueba si estan correctos los datos ingresados.
            for ($i=0; $i< $long; $i++) {
               $model->nota = $notas[$i];
               $model->alumno_id = $ids[$i];

               if(!$model->validate())
               {
                    return '0';
                    break;

               }
            }

            //Actualiza los datos en la base de datos.
            for ($i=0; $i< $long; $i++) {
                $model->alumno_id = $ids[$i];
                $model =  Acta::findOne([  'libro' => $model->libro, 
                                                'folio'=> $model->folio,
                                                'fecha_examen'=> FechaHelper::fechaYMD($model->fecha_examen),
                                                'condicion_id'=> $model->condicion_id,
                                                'materia_id'=> $model->materia_id,
                                                'alumno_id'=> $model->alumno_id]);
               $model->load(Yii::$app->request->post());
               if($notas[$i] > 0){
                    $model->asistencia=1;
                }else{
                    $model->asistencia=0;
                }
               $model->nota = $notas[$i];
               $model->save();
            }
            return '1';
        }
    }

    public function actionDestroyedNotas()
    {
        $model = new Acta();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) 
        {
            $query =  Acta::find()->where([  'libro' => $model->libro, 
                                                'folio'=> $model->folio,
                                                'fecha_examen'=>  FechaHelper::fechaYMD($model->fecha_examen),
                                                'condicion_id'=> $model->condicion_id,
                                                'materia_id'=> $model->materia_id])->all();
            foreach ($query as $q) {
                $q->delete();
            }
            return;
        }
    }

    protected function findModelInscripcion($id)
    {
        if (($model = Inscripcion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionRegistrarEquivalencia($id)
    {
        $inscripcion = $this->findModelInscripcion($id);
        $model = new Acta();

        if ($model->load(Yii::$app->request->post())) {
            $model->condicion_id=4;
            $model->alumno_id= $inscripcion->alumno_id;
            if($model->save()){
                Yii::$app->session->setFlash('success', "Registración de equivalencia realizada correctamente");
                return $this->render('_form_equivalencia', [
                    'model' => $model,
                    'inscripcion'=>$inscripcion
                ]);
            }
            
        } 
        return $this->render('_form_equivalencia', [
            'model' => $model,
            'inscripcion'=>$inscripcion
        ]);
        
    }


}

<?php

namespace backend\controllers;

use Yii;
use backend\models\Alumno;
use backend\models\search\AlumnoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use backend\models\search\InscripcionSearch;
use backend\models\search\MateriaSearch;
use backend\models\Inscripcion;
use backend\models\Acta;
use common\models\FechaHelper;
use backend\models\Cursada;
use backend\models\search\CursadaSearch;
/**
 * AlumnoController implements the CRUD actions for Alumno model.
 */
class AlumnoController extends Controller
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

    public function actionValidation()
    {
      $model = new Alumno();

      if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }  

    }

    /**
     * Lists all Alumno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlumnoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alumno model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {        
        $model= $this->findModel($id);
        //Busqueda de Inscripcion del alumno
        $searchModel = new InscripcionSearch();
        $searchModel->alumno_id = $id; 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Busqueda de Inscripcion en materia del alumno
        /*$searchModel_cursada = new InscripcionMateriaSearch();
        $searchModel_cursada->alumno_id= $alumno->id;
        $dataProvider_cursada = $searchModel_cursada->search(Yii::$app->request->queryParams);*/

        //Busqueda de Materias segun la carrera del alumno

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'searchModel_cursada' => $searchModel_cursada,
            //'dataProvider_cursada' => $dataProvider_cursada,
        ]);
    }

    public function actionListarMateria($id)
    {
        $model=$this->findModelInscripcion($id);
        $searchModel = new CursadaSearch();
        $searchModel->alumno_id = $model->alumno_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('_inscripcion_materia', [
            'model' => $model, 
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Alumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Alumno();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionNuevo()
    {
        $model = new Alumno();

        if ($model->load(Yii::$app->request->post())) {
            
            if($model->save()){            
                 echo 1;
             }else{
                 echo 0;
             }
         } else {
             return $this->renderAjax('_form_modal', [
                 'model' => $model,
             ]);
         }
    }

    /**
     * Updates an existing Alumno model.
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
     * Deletes an existing Alumno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionImprimirAnalitico($id){
        
                $model=$this->findModelInscripcion($id);              
                $alumno = $model->alumno_id;
                $carrera = $model->carrera_id;        
                $query = Acta::find()
                         ->joinWith(['materia'])
                         ->where(['alumno_id' => $alumno])                
                         ->andWhere(['asistencia'=>1])                            
                         ->andWhere(['materia.carrera_id' => $carrera])
                         ->orderBy('materia.anio')
                         ->all();
                
                $promedio=Alumno::getPromedio($query);
        
                
                $mes=FechaHelper::obtenerMes(date('Y-m-d'));
                $pdf = Yii::$app->pdf;        
                $pdf->cssFile = 'css/reporte.css';
                $pdf->options = ['title' => 'Constancia Analitica'];
                $pdf->content = $this->renderPartial('reporte_constancia_analitica', [
                    'model' => $model,
                    'analitico' => $query,
                    'promedio'=>$promedio,
                    'mes'=>$mes            
                ]);
                
                
                return $pdf->render();
            }

    /**
     * Finds the Alumno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alumno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alumno::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
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

    protected function findModelCursada($id)
    {
        if (($model = Cursada::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}

<?php

namespace backend\controllers;

use Yii;
use backend\models\Inscripcion;
use backend\models\Alumno;
use backend\models\search\InscripcionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\FechaHelper;

/**
 * InscripcionController implements the CRUD actions for Inscripcion model.
 */
class InscripcionController extends Controller
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
     * Lists all Inscripcion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InscripcionSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }    

    /**
     * Displays a single Inscripcion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $alumno= $this->findModelAlumno($model->alumno_id);
        return $this->render('view', [
            'model' => $model,
            'alumno'=> $alumno,
        ]);
    }

     /**
     * Registra una nueva inscripcion a una carrera desde la vista alumno/_academico.     
     * @return mixed
     */
     public function actionNuevo($id)
     {
         $model = new Inscripcion();
         $alumno= $this->findModelAlumno($id);         
         if ($model->load(Yii::$app->request->post()) ) {
             $model->alumno_id= $id;
             if($model->save()){
                Yii::$app->session->setFlash('success', "Su inscripción se realizo correctamente");
                return $this->redirect(['view', 'id' => $model->id]);
             }
            
         } else {
             return $this->render('formulario', [
                 'model' => $model,
                 'alumno' => $alumno,
             ]);
         }
     }

    /**
     * Creates a new Inscripcion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inscripcion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Su inscripción se realizo correctamente");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inscripcion model.
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
     * Deletes an existing Inscripcion model.
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
     * Finds the Inscripcion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inscripcion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inscripcion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelAlumno($id)
    {
        if (($model = Alumno::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionImprimir($id){
        
        $mes=FechaHelper::obtenerMes(date('Y-m-d'));
        $pdf = Yii::$app->pdf;
        $inscripcion = $this->findModel($id);
        $pdf->cssFile = 'css/reporte.css';
        $pdf->options = ['title' => 'Certificado de Alumno Regular'];    
        $pdf->content = $this->renderPartial('certificado_alumno_regular', [
            'inscripcion' =>$inscripcion,
            'mes'=>$mes,           
        ]);
        
        return $pdf->render();
    }
}

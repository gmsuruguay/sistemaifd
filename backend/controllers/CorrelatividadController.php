<?php

namespace backend\controllers;

use Yii;
use backend\models\Correlatividad;
use backend\models\Materia;
use backend\models\search\CorrelatividadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CorrelatividadController implements the CRUD actions for Correlatividad model.
 */
class CorrelatividadController extends Controller
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
     * Lists all Correlatividad models.
     * @return mixed
     */
    public function actionAdd()
    {
        
        $request = Yii::$app->request;
        $materia_id = $request->post('materia_id');
        Correlatividad::deleteAll('materia_id = '.$materia_id);

        /*if ($model->load($request->post())) 
        {
            $array = $request->post('materia_id_correlativa');
            $length= count($array);
            for ($i=0;$i<$length; $i++) {
                 $model->materia_id_correlativa = $array[$i];
                 $model->save();
            }

           
            return $this->redirect(['carrera/view', 'id' => $model->id]);
        } 
        else 
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
         $array = $request->post('materia_id_correlativa');
            $length= count($array);
            for ($i=0;$i<$length; $i++) {
                 $model = new Correlatividad();
                 $model->materia_id_correlativa = $array[$i];
                 $model->materia_id = $materia_id;
                 $model->save();
            }

        $materia = Materia::findOne($materia_id);
        return $this->redirect(['carrera/view', 'id' => $materia->carrera_id]);
        
    }
    /**
     * Lists all Correlatividad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CorrelatividadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Correlatividad model.
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
     * Creates a new Correlatividad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Correlatividad();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Correlatividad model.
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
     * Deletes an existing Correlatividad model.
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
     * Finds the Correlatividad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Correlatividad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Correlatividad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

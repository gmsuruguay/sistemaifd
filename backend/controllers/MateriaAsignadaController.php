<?php

namespace backend\controllers;

use Yii;
use backend\models\MateriaAsignada;
use backend\models\Materia;
use backend\models\Docente;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MateriaAsignadaController implements the CRUD actions for MateriaAsignada model.
 */
class MateriaAsignadaController extends Controller
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
     * Lists all MateriaAsignada models.
     * @return mixed
     */
    /*public function actionIndex($docente_id)
    {
        $model = new MateriaAsignada();
        $docente = Docente::findOne($docente_id);
        $dataProvider = new ActiveDataProvider([
            'query' => MateriaAsignada::find(),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'docente' => $docente,
            'model' => $model,
        ]);
    }*/

    /**
     * Displays a single MateriaAsignada model.
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
     * Creates a new MateriaAsignada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($docente_id = 0)
    {
        $model = new MateriaAsignada();
        $docente = Docente::findOne($docente_id);
        $dataProvider = new ActiveDataProvider([
            'query' => MateriaAsignada::find()->where(['docente_id' => $docente_id]),
        ]);
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'docente_id' => $model->docente_id]);
        } else {
            return $this->render('create', [
                'dataProvider' => $dataProvider,
                'model' => $model,
                'docente'=> $docente,
            ]);
        }
    }

    /**
     * Updates an existing MateriaAsignada model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $materias = Materia::find()->where(['carrera_id'=> $model->materia->carrera->id])->all();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'docente_id' => $model->docente_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'materias' => $materias,
            ]);
        }
    }

    /**
     * Deletes an existing MateriaAsignada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $docente_id = $model->docente_id;
        $model->delete();

        return $this->redirect(['create', 'docente_id'=> $docente_id]);
    }

    /**
     * Finds the MateriaAsignada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MateriaAsignada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MateriaAsignada::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

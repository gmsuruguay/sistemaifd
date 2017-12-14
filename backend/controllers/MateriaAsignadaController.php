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
       
        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save()){
                $materia=$this->findModelMateria($model->materia_id);
                $materia->estado=1;
                $materia->update();
                return $this->redirect(['create', 'docente_id' => $model->docente_id]);
            }
            
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
        $id_materia_ant= $model->materia_id;
        $materias = Materia::find()->where(['carrera_id'=> $model->materia->carrera->id ,'estado'=>0])->all();
        
        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save()){
                if($id_materia_ant!=$model->materia_id){
                    // Seteo a 0 (Disponible) el estado de la materia anterior 
                    $materia=$this->findModelMateria($id_materia_ant);
                    $materia->estado=0;
                    $materia->update();

                    // Seteo a 1 (Asignada) el estado de la materia nueva 
                    $materia=$this->findModelMateria($model->materia_id);
                    $materia->estado=1;
                    $materia->update();
                }
                
                return $this->redirect(['create', 'docente_id' => $model->docente_id]);
            }
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
        $model->fecha_baja=date('Y-m-d');
        if($model->update()){
             // Seteo a 0 (Disponible) el estado de la materia 
            $materia=$this->findModelMateria($model->materia_id);
            $materia->estado=0;
            $materia->update();
            return $this->redirect(['create', 'docente_id'=> $docente_id]);
        }else{
            throw new NotFoundHttpException('Ocurrio un error durante la baja');
        }


        
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

    protected function findModelMateria($id)
    {
        if (($model = Materia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

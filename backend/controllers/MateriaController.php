<?php

namespace backend\controllers;

use Yii;
use backend\models\Materia;
use backend\models\Correlatividad;
use backend\models\search\MateriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use backend\models\search\CorrelatividadSearch;
use yii\widgets\ActiveForm;
/**
 * MateriaController implements the CRUD actions for Materia model.
 */
class MateriaController extends Controller
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
      $model = new Materia();

      if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }  

    }

    /**
     * Lists all Materia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MateriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materia model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id)
    { 
        $model= $this->findModel($id);
        $materias = Materia::find()
                    ->where(['carrera_id' => $model->carrera_id])
                    ->andWhere('id<>'.$id)
                    ->andWhere('anio<='.$model->anio)
                    ->all();
        $correlativasAprobadas = Correlatividad::find()
                        ->where(['materia_id' => $id])
                        ->andWhere(['tipo' => 'a'])
                        ->all();
        $correlativasRegulares = Correlatividad::find()
                        ->where(['materia_id' => $id])
                        ->andWhere(['tipo' => 'r'])
                        ->all();
                        
        $indicesAprobadas = $this->indexCorrelativas($materias, $correlativasAprobadas);
        $indicesRegulares = $this->indexCorrelativas($materias, $correlativasRegulares);
        return $this->render('view', [
            'model' => $model,
            'materias'=> $materias,
            'indicesA'=> $indicesAprobadas,
            'indicesR'=> $indicesRegulares,
        ]);
    }

    private function indexCorrelativas($arrayMaterias, $arrayCorrelativas)
    {
        $length = count($arrayCorrelativas);
        $lengthTwo =count($arrayMaterias);
        if($length==0)
        {
            return null;
        }
        $array = [];
        for($i=0; $i<$length;$i++){
            for($j=0; $j<$lengthTwo;$j++){
                if($arrayCorrelativas[$i]->materia_id_correlativa == $arrayMaterias[$j]->id){
                    array_push($array, $arrayCorrelativas[$i]->materia_id_correlativa);
                }
            }
        }
        return $array;
    }*/

    public function actionView($id)
    { 
        $model= $this->findModel($id);
        $searchModel = new CorrelatividadSearch();
        $searchModel->materia_id= $model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('view', [
            'model' => $model, 
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       
    }


    /**
     * Creates a new Materia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Materia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionCreate($id)
    {
        $model = new Materia();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->carrera_id= $id;
            $model->estado = 0;
            if($model->save()){
                echo 1;
            }
            else{
                echo 0;
            }                           
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Materia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo 1;
         } else {
             return $this->renderAjax('update', [
                 'model' => $model,
             ]);
         }
    }

    /**
     * Deletes an existing Materia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model= $this->findModel($id);
        $carrera_id = $model->carrera_id;
        if($model->delete()){
            Yii::$app->session->setFlash('danger', "Elemento eliminado correctamente");
            return $this->redirect(['/carrera/view',
                'id' => $carrera_id
            ]);
        }
    }

    /**
     * Finds the Materia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

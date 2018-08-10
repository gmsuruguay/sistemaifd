<?php

namespace backend\controllers;

use Yii;
use backend\models\Docente;
use backend\models\Carrera;
use backend\models\Materia;
use backend\models\MateriaAsignada;
use backend\models\search\DocenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\TituloDocente;
use backend\models\search\TituloDocenteSearch;
use yii\helpers\ArrayHelper;
/**
 * DocenteController implements the CRUD actions for Docente model.
 */
class DocenteController extends Controller
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
     * Lists all Docente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docente model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $docente= $this->findModel($id);
        $searchModel = new TituloDocenteSearch();
        $searchModel->docente_id= $docente->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $docente,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Docente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Docente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('info', "Por favor continúe agregando los datos académicos del docente");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /*public function actionCreate()
    {
        $model = new Docente();
        $model_titulo = new TituloDocente();

        if ($model->load(Yii::$app->request->post()) && $model_titulo->load(Yii::$app->request->post()) ) {
            if($model->save()){               
                
                foreach ($model_titulo->titulo_id as $value) {
                    $datos= new TituloDocente();                
                    $datos->docente_id= $model->id;
                    $datos->titulo_id= $value;
                    $datos->save();
                }
                return $this->redirect(['index']);
            }            
        } 
        return $this->render('create', [
            'model' => $model,
            'model_titulo' =>$model_titulo
        ]);
    }*/

    /**
     * Updates an existing Docente model.
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
    /*public function actionUpdate($id)
    {
        $model_titulo = new TituloDocente();
        $model = $this->findModel($id);
        $sql = TituloDocente::find()->where('docente_id = :id', [':id' => $model->id])->all();
        $titulos = array();
        $i=0;
        foreach ($sql as $modelo) {
            $titulos[$i]= $modelo->titulo_id;
            ++$i;
        }
        //print_r($titulos) ;die;
        
        if ($model->load(Yii::$app->request->post()) && $model_titulo->load(Yii::$app->request->post()) ) {
            if($model->save()){               
                TituloDocente::deleteAll(['docente_id' => $model->id]);
                foreach ($model_titulo->titulo_id as $value) {
                    $datos= new TituloDocente();                
                    $datos->docente_id= $model->id;
                    $datos->titulo_id= $value;
                    $datos->save();
                }
                return $this->redirect(['index']);
            }            
        } 
        return $this->render('update', [
            'model' => $model,
            'model_titulo' =>$model_titulo,
            'titulos'=>$titulos,
        ]);
    }*/

    /**
     * Deletes an existing Docente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBaja($id)
    {
        $model = $this->findModel($id);
        $model->fecha_baja = date('Y-m-d');
        if( $model->update() ){

            // Baja en materias asignadas
            $this->bajaMateriasAsignadas($id);

            Yii::$app->session->setFlash('success', "Se realizo la baja correctamente");            
            return $this->redirect(['index']);

       }else{
           throw new NotFoundHttpException('Ocurrio un error durante la baja');
       }

       
    }

    protected function bajaMateriasAsignadas($id)
    {
        //Busco materias asignadas a los docentes
        $materias= MateriaAsignada::find()
        ->where(['docente_id'=> $id])
        ->andWhere(['fecha_baja' => null])
        ->all();

        foreach ($materias as $m) {
            $m->fecha_baja= date('Y-m-d');
            $m->update();
            $this->materiaDisponible($m->materia_id);   // Seteo a 0 (Disponible) el estado de la materia         
        }
        
    }

    protected function materiaDisponible($id)
    {
        // Seteo a 0 (Disponible) el estado de la materia 
        $materia=$this->findModelMateria($id);
        $materia->estado=0;
        $materia->update();
    }

    /**
     * Finds the Docente model based on its primary key value.
     * @param integer $id
     * @return mixed
     */
    public function actionAsignarMateria($id)
    {
        $model = $this->findModel($id);
        $carreras = Carrera::find()->all();

         return $this->render('asignar_materia', [
            'model' => $model,
            'carreras'=> $carreras,
        ]);
    }

    public function actionChangeCarrera($carreraId)
    {
        $materias= Materia::find()
                            ->where(['carrera_id'=> $carreraId,'estado'=>0])
                            ->all();
        echo "<option>--------------</option>" ; 
        foreach ($materias as $m)
        {
            echo '<option value="'.$m->id.'">'.$m->descripcion.'</option>';
        }
    }

    /**
     * Finds the Docente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Docente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Docente::findOne($id)) !== null) {
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

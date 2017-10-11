<?php

namespace backend\controllers;

use Yii;
use backend\models\Cursada;
use backend\models\Materia;
use backend\models\Acta;
use backend\models\Alumno;
use backend\models\search\CursadaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * CursadaController implements the CRUD actions for Cursada model.
 */
class CursadaController extends Controller
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
     * Lists all Cursada models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursadaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cursada model.
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
     * Creates a new Cursada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cursada();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cursada model.
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
     * Deletes an existing Cursada model.
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
     * Finds the Cursada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cursada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cursada::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionIndexAuto()
    {
        $model = new Cursada();
        if ($model->load(Yii::$app->request->post())) {

            return $this->redirect(['create-auto', 
                                    'fecha_inscripcion'=> $model->fecha_inscripcion,
                                    'fecha'=> $model->fecha,
                                    'materia_id'=> $model->materia_id,
                                    'fecha_vencimiento'=> $model->fecha_vencimiento]);
        } else {
            return $this->render('index_auto', [
                'model' => $model,
            ]);
        }
    }

    public function actionMaterias()
    {
        if (Yii::$app->request->post()) {
            $materias= Materia::find()
                            ->where(['carrera_id'=> Yii::$app->request->post('carreraId')])
                            ->all();
            echo '<option>--------------</option>';
            foreach ($materias as $m)
            {
                echo '<option value="'.$m->id.'">'.$m->descripcion.'</option>';
            }
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

    public function actionCreateAuto($fecha_inscripcion='00/00/0000', $fecha = '00/00/0000', $materia_id='0', $fecha_vencimiento='00/00/0000')
    {
        $model = new Cursada();
        if (Yii::$app->request->isPjax) {
            //return Yii::$app->request->isPjax->getId;
        }

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->save()) {
           $dataProvider = new ActiveDataProvider([
                'query' => Cursada::find()->where(['fecha_inscripcion' => $model->fecha_inscripcion, 'fecha'=> $model->fecha, 'materia_id'=> $model->materia_id]),
            ]);
           return  $this->renderPartial('_grid_cursada', ['dataProvider' => $dataProvider]);
        } else {
            $model->fecha_inscripcion = $fecha_inscripcion;
            $model->fecha = $fecha;
            $model->materia_id = $materia_id;
            $model->fecha_vencimiento = $fecha_vencimiento;
            $dataProvider = new ActiveDataProvider([
                'query' => Cursada::find()->where(['fecha_inscripcion' => date("Y-m-d", strtotime($fecha_inscripcion)), 'fecha'=> date("Y-m-d", strtotime($fecha)), 'materia_id'=> $materia_id]),
            ]);
            $_grid_cursada = $this->renderPartial('_grid_cursada', ['dataProvider' => $dataProvider],true);
            
            return $this->render('create_auto', ['model' => $model ,'gridCursada' => $_grid_cursada]);
        }
    }

    public function actionDeleteAuto($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();

        return $this->redirect(['create-auto', 
                                    'fecha_inscripcion'=> $model->fecha_inscripcion,
                                    'fecha'=> $model->fecha,
                                    'materia_id'=> $model->materia_id,
                                    'fecha_vencimiento'=> $model->fecha_vencimiento]);
    }

    public function actionUpdateAuto($fecha_inscripcion='00/00/0000', $fecha = '00/00/0000', $materia_id='0')
    {
        $model = Cursada::findOne(['fecha_inscripcion' => date("Y-m-d", strtotime($fecha_inscripcion)),
                                'fecha'=> date("Y-m-d", strtotime($fecha)),
                                'materia_id'=> $materia_id,
            ]);

       
        if(!$model)
        {
            return $this->redirect(['index-auto']);
        }

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $modelFind = Cursada::find()->where(['fecha_inscripcion' => date("Y-m-d", strtotime(Yii::$app->request->post('ant_f_i'))),
                                              'fecha'=> date("Y-m-d", strtotime(Yii::$app->request->post('ant_f'))),
                                              'materia_id'=> Yii::$app->request->post('ant_m_i'),
                                              'fecha_vencimiento'=>date("Y-m-d", strtotime(Yii::$app->request->post('ant_f_v'))),
                ])->all();
            //return print_r($modelFind);
            foreach ($modelFind as $m) {
               $m->fecha_inscripcion        =  $model->fecha_inscripcion;
               $m->fecha        =  $model->fecha;
               $m->materia_id   =  $model->materia_id;
               $m->fecha_vencimiento =  $model->fecha_vencimiento;
               $m->save();
            }
           return $this->redirect(['create-auto', 
                                    'fecha_inscripcion'=> $model->fecha_inscripcion,
                                    'fecha'=> $model->fecha,
                                    'materia_id'=> $model->materia_id,
                                    'fecha_vencimiento'=> $model->fecha_vencimiento]);
        } else {
            $materias = Materia::find()->where(['carrera_id'=> $model->materia->carrera->id])->all();
            return $this->render('update_auto', [
                'model' => $model,
                'materias'=> $materias,
            ]);
        }
    }

    public function actionDestroyedAllAuto($fecha_inscripcion='00/00/0000', $fecha = '00/00/0000', $materia_id='0')
    {
        $model = Cursada::find()->where(['fecha_inscripcion' => date("Y-m-d", strtotime($fecha_inscripcion)),
                                'fecha'=> date("Y-m-d", strtotime($fecha)),
                                'materia_id'=> $materia_id,
            ])->all();

        foreach ($model as $m) {
                $m->delete();
        }

        return $this->redirect(['index-auto']);
    }

}

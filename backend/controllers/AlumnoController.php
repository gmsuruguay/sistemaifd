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
use backend\models\search\MateriaCursadaSearch;
use backend\models\Inscripcion;
use backend\models\Acta;
use common\models\FechaHelper;
use backend\models\Cursada;
use backend\models\search\CursadaSearch;
use backend\models\Perfil;
use common\models\AuthAssignment;
use common\models\User;
use backend\models\Pedido;
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
        
        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'searchModel_cursada' => $searchModel_cursada,
            //'dataProvider_cursada' => $dataProvider_cursada,
        ]);
    }

    public function actionInscripcionCursada($id)
    {
        $model=$this->findModelInscripcion($id);
        $searchModel = new CursadaSearch();
        $searchModel->alumno_id = $model->alumno_id;
        $searchModel->carrera = $model->carrera_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('_inscripcion_materia', [
            'model' => $model, 
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHistorialAcademico($id)
    {
        $connection = \Yii::$app->db;
        $model=$this->findModelInscripcion($id);
        $alumno = $model->alumno_id;
        $carrera = $model->carrera_id; 
        
        //Consulta en actas y cursadas                 
        

        $sql= 'SELECT m.descripcion, m.anio, nota, fecha_examen as fecha, c.descripcion as condicion, :examen as tipo  FROM acta
        JOIN materia as m on m.id = acta.materia_id
        JOIN condicion as c on c.id = acta.condicion_id
        WHERE m.carrera_id=:carrera AND alumno_id=:alumno AND asistencia = 1
        UNION ALL
        SELECT m.descripcion, m.anio, nota, fecha_cierre as fecha, c.descripcion as condicion, :cursada as tipo FROM cursada
        JOIN materia as m on m.id = cursada.materia_id
        JOIN condicion as c on c.id = cursada.condicion_id
        WHERE m.carrera_id =:carrera AND alumno_id =:alumno
        ORDER BY fecha DESC';

        $query = $connection->createCommand($sql);
        $query->bindValue(":carrera", $carrera);
        $query->bindValue(":alumno", $alumno);
        $query->bindValue(":examen", 'EXAMEN');
        $query->bindValue(":cursada", 'CURSADA');

        $materias= $query->queryAll();
        
        return $this->render('historia-academica', [
            'model' => $model,  
            'materias' => $materias,             
        ]);
    }

    public function actionListarMateria($id)
    {
        $model=$this->findModelInscripcion($id);
        $searchModel = new MateriaCursadaSearch();
        $searchModel->carrera_id = $model->carrera_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderAjax('listado-materias', [
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

    public function actionGenerarUsuario($id)
    {
        $alumno = $this->findModel($id);
        $user = new User();
        $perfil = new Perfil();
        $role= new AuthAssignment();
        //$user->scenario='create';

        if ( !empty($alumno->email) ) {
           
            $password= '12345678';
            $user->username = $alumno->numero; 
            $user->email= $alumno->email;
            $user->role='ALUMNO';
            $user->created_at= time();
            $user->updated_at= time();
            $user->setPassword($password);
            $user->generateAuthKey();
            
            //echo $model->role;            
            //die;
            if ($user->save()) {

                $alumno->user_id= $user->id;
                $alumno->save();

                $perfil->user_id = $user->id;
                $perfil->nombre = $alumno->nombre;
                $perfil->apellido = $alumno->apellido;
                $perfil->save();

                $role->item_name= $user->role;
                $role->user_id = $user->id;
                $role->created_at= time();
                $role->save();

                echo 1; // El usuario se creo correctamente

            }else{
                echo 2; //Error al generar el Usuario
            }
        }else{
            echo 3; //Se necesita registrar primeramente el E-mail del Alumno, por favor actualice su legajo
        }

        
    }

}

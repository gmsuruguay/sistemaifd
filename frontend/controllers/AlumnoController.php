<?php

namespace frontend\controllers;

use Yii;
use backend\models\Alumno;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use backend\models\Inscripcion;
use backend\models\Cursada;
use backend\models\Correlatividad;
use backend\models\Acta;
use backend\models\Materia;
use backend\models\Carrera;
use backend\models\Pedido;
use backend\models\search\CursadaSearch;

class AlumnoController extends Controller
{
    public function actionIndex()
    {   
        $id_alumno= Yii::$app->user->identity->idAlumno; 
        $model= Inscripcion::find()->where(['alumno_id'=>$id_alumno])->all();        

        return $this->render('index', [                     
            'model' => $model,           
        ]);
    }

    public function actionLegajo()
    {
        $id=Yii::$app->user->identity->idAlumno;
        $model= $this->findModel($id);     
             

        return $this->render('legajo', [                     
            'model' => $model,           
        ]);
    }

    /*public function actionListarMateria($id)
    {
        $model=$this->findModelInscripcion($id);
        $searchModel = new MateriaCursadaSearch();
        $searchModel->carrera_id = $model->carrera_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('listado-materias', [
            'model' => $model, 
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    public function actionListarMateria($id)
    {       
        $carrera= $this->findModelCarrera($id);

        $materias_aprobadas = Acta::find()->select('materia_id')
                            ->where(['alumno_id'=>Yii::$app->user->identity->idAlumno])
                            ->andWhere(['>=','nota',4]);

        $query = Materia::find()->where(['NOT IN', 'id', $materias_aprobadas ])->andWhere(['carrera_id' => $id]); 

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['anio' => SORT_ASC]],
        ]);

        return $this->render('listado-materias', [
            'carrera'=>$carrera,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionVerInscripciones($id)
    {
        $model=$this->findModelInscripcion($id);
        $searchModel = new CursadaSearch();
        $searchModel->alumno_id = Yii::$app->user->identity->idAlumno;
        $searchModel->carrera = $model->carrera_id;
        $searchModel->periodo = date('Y');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
        
        return $this->render('listado-inscripciones', [
            'model' => $model,             
            'dataProvider' => $dataProvider,
        ]);
    }

    private function estaAprobada($id)
    {
        // Verificación para las materias que necesiten estar APROBADAS
        
        $existe= Acta::find()
        ->where(['materia_id'=>$id, 'alumno_id'=>Yii::$app->user->identity->idAlumno])
        ->andWhere(['>=','nota',4])->count();

        return $existe;
    }

    private function estaRegular($id)
    {
        // Verificación para las materias que necesiten estar REGULARES
        $fecha=date('Y-m-d');

        $existe= Cursada::find()
        ->where(['materia_id'=>$id])
        ->andWhere(['alumno_id'=>Yii::$app->user->identity->idAlumno])
        ->andWhere(['>=','nota',4])
        ->andWhere(['>=','fecha_vencimiento',$fecha])->count();

        return $existe;
        
    }

    private function estaLibre($id)
    {
        // Verificación para las materias que necesiten estar REGULARES
        $fecha=date('Y-m-d');

        $existe= Cursada::find()
        ->where(['materia_id'=>$id])
        ->andWhere(['alumno_id'=>Yii::$app->user->identity->idAlumno])
        ->andWhere(['<','nota',4])
        ->orWhere(['<','fecha_vencimiento',$fecha])->count();

        return $existe;
        
    }

    private function cumpleCondicion($c)
    {
        // Verificación para las materias correlativas que necesiten estar APROBADAS             
        if ($c->tipo=='a') {
            if($this->estaAprobada($c->materia_id_correlativa) > 0){
                return true; // La materia esta aprobada
            }else{
                throw new NotFoundHttpException('Debe tener APROBADA la Materia '.Materia::descripcionCompletaMateria($c->materia_id_correlativa));
            }
        }    
        

        // Verificación para las materias correlativas que necesiten estar REGULARES       
        
        if ($c->tipo=='r') {
            if( ($this->estaRegular($c->materia_id_correlativa)> 0) || ($this->estaAprobada($c->materia_id_correlativa) > 0) ){
                return true;
            }else{
                throw new NotFoundHttpException('Debe tener REGULARIZADA la Materia '.Materia::descripcionCompletaMateria($c->materia_id_correlativa));
            }
        }        

        return false;
    }

    //Metodo que verifica si la materia tiene correlatividades
    private function verificarCorrelatividad($id)
    {
        $correlativas= Correlatividad::find()->where(['materia_id' => $id])->all();

        if ($correlativas != null) { //Entra solo si existen correlativas para la materia
           
            foreach ($correlativas as $c) {
                // Si existe al menos una materia correlativa que no este regular o aprobada
                // no se podra inscribir. Por lo tanto retorna falso
                
                if(!$this->cumpleCondicion($c)){ 
                   return false;
                }
             }
        }
       
        return true; //Retorna verdadero significa que la materia correlativa cumple la condicion o no tiene correlativas
    }

    //Metodo que verifica si existe alguna inscripción a una cursada
    private function verificarCondicion($id)
    {
        $existe= Cursada::find()->where(['materia_id'=>$id, 'alumno_id'=>Yii::$app->user->identity->idAlumno])->count();
        if($existe==0){ //Entra cuando no existe una inscripción de la misma.
            if ($this->verificarCorrelatividad($id)) { //Verificar la condición de las correlatividades
               return true;
            }
        }elseif($this->estaAprobada($id) > 0){ // Existe pero debe verificar que no este aprobada
            throw new NotFoundHttpException('No se puede inscribir, la materia '.Materia::descripcionCompletaMateria($id).' ya esta APROBADA');
        }else{
            if ($this->verificarCorrelatividad($id)) { //Verificar la condición de las correlatividades
                return true;
             }
        }        
        
    }

    /*public function actionInscribirMateria($id)
    {
        if(!$this->verificarCondicion($id)){ //Se verifica si el alumno esta inscripto en la cursada
            return "No se puede Inscribir";  // Debe recibir un valor falso
        }

        $model = new Cursada();

        $model->fecha_inscripcion = date('Y-m-d');
        $model->alumno_id= Yii::$app->user->identity->idAlumno;
        $model->materia_id = $id;

        if ($model->save()) {           
           
                echo "Exito";        
            
        } else {
            echo "Error durante la inscripción";
        }
    }*/

    public function actionInscribirMateria($id, $id_carrera)
    {
        if($this->verificarCondicion($id)){ //Se verifica condición en otras materias
            $model = new Cursada();
            
                    $model->fecha_inscripcion = date('Y-m-d');
                    $model->alumno_id= Yii::$app->user->identity->idAlumno;
                    $model->materia_id = $id;
            
                    if ($model->save()) {    
                        
                        Yii::$app->session->setFlash('success', "Su inscripción se realizo correctamente");
                        return $this->redirect(['listar-materia',
                            'id' => $id_carrera,
                        ]);                     
                                   
                        
                    } else {
                        echo "Error durante la inscripción";
                    }
        }

        
    }

    public function actionActualizar($id)
    {
        
        $model = $this->findModel($id);
        $model->scenario='actualizar';
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['legajo']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionTramites()
    {
        $id_alumno= Yii::$app->user->identity->idAlumno; 

        $inscripcion= Inscripcion::find()->where(['alumno_id'=>$id_alumno])->all();   
       
        $model = new Pedido();

        if ($model->load(Yii::$app->request->post())) {
            $model->alumno_id= $id_alumno;
            $model->fecha_pedido = date('Y/m/d');
            $model->estado = '0';
            if($model->save())
            {
                 Yii::$app->session->setFlash('success',"Su pedido fue enviado correctamente!, podra retirarlo luego de 24 hs.");
            }
            else
            {
                 Yii::$app->session->setFlash('error',"No se pudo efectuar su pedido!");
            }

            return $this->redirect(['tramites']);
        } else {
            return $this->render('pedidos', [
                'model' => $model,
                'inscripcion'=>$inscripcion,
            ]);
        }
    }
    

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

    protected function findModelCarrera($id)
    {
        if (($model = Carrera::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

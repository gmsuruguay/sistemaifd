<?php

namespace frontend\controllers;

use Yii;
use backend\models\Alumno;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use backend\models\Inscripcion;
use backend\models\search\MateriaCursadaSearch;
use backend\models\Cursada;
use backend\models\Correlatividad;
use backend\models\Acta;

class AlumnoController extends Controller
{
    public function actionIndex()
    {   
        $id_alumno= Yii::$app->user->identity->idAlumno; 
        $query= Inscripcion::find()->where(['alumno_id'=>$id_alumno]);       
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
        ]);       

        return $this->render('index', [                     
            'dataProvider' => $dataProvider,           
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

    public function actionListarMateria($id)
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
    }

    private function cumpleCondicion($id_correlativa)
    {
        // Verificación para las materias correlativas que necesiten estar APROBADAS
        
        $existe= Acta::find()
                ->where(['materia_id'=>$id_correlativa, 'alumno_id'=>Yii::$app->user->identity->idAlumno])
                ->andWhere(['>=','nota',4])->count();
             
        if($existe>0){
            return true; // La materia esta aprobada
        }

        // Verificación para las materias correlativas que necesiten estar REGULARES
        $existe_cursada= Cursada::find()
        ->where(['materia_id'=>$id_correlativa, 'alumno_id'=>Yii::$app->user->identity->idAlumno])
        ->andWhere(['>=','nota',4])
        ->andWhere(['<=','fecha_vencimiento',date('Y-m-d')])->count();

        if($existe_cursada>0){
            return true;
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
                
                if(!$this->cumpleCondicion($c->materia_id_correlativa)){ 
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
        if($existe==0){
            if ($this->verificarCorrelatividad($id)) { //Verificar la condición de las correlatividades
               return true;
            }
        }
        
        return false;
    }

    public function actionInscribirMateria($id)
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

}

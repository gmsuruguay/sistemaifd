<?php

namespace frontend\controllers;

use Yii;
use backend\models\Alumno;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use backend\models\Inscripcion;

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

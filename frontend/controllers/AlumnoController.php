<?php

namespace frontend\controllers;

use Yii;
use backend\models\Alumno;
use backend\models\search\AlumnoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\search\InscripcionSearch;
use backend\models\search\MateriaCursadaSearch;
use backend\models\Inscripcion;

class AlumnoController extends Controller
{
    public function actionIndex()
    {
        //$model= $this->findModel($id);
        //Busqueda de Inscripcion del alumno
        $searchModel = new InscripcionSearch();
        $searchModel->alumno_id = 1; 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);       

        return $this->render('index', [                     
            'dataProvider' => $dataProvider,           
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

<?php

namespace backend\controllers;

use Yii;
use backend\models\InscripcionExamen;
use backend\models\search\InscripcionExamenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\CalendarioExamen;
use common\models\FechaHelper;
use yii\db\Query;
use yii\helpers\Html;
/**
 * InscripcionExamenController implements the CRUD actions for InscripcionExamen model.
 */
class InscripcionExamenController extends Controller
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
     * Lists all InscripcionExamen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InscripcionExamenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InscripcionExamen model.
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
     * Creates a new InscripcionExamen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InscripcionExamen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InscripcionExamen model.
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
     * Deletes an existing InscripcionExamen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionActivar($id)
    {
        $model = $this->findModel($id);
        $model->estado = InscripcionExamen::STATUS_ACTIVE;
        if( $model->update() ){

            // Se cambio al estado activo
            Yii::$app->session->setFlash('success', "Se autorizo correctamente el permiso de examen solicitado");            
            return $this->redirect(['index']);

       }else{
           throw new NotFoundHttpException('Ocurrio un error');
       }
    }

    public function actionDesactivar($id)
    {
        $model = $this->findModel($id);
        $model->estado =InscripcionExamen::STATUS_INACTIVE;
        if( $model->update() ){

            // Se cambio al estado activo
            Yii::$app->session->setFlash('success', "Se desactivo correctamente el permiso de examen solicitado");            
            return $this->redirect(['index']);

       }else{
           throw new NotFoundHttpException('Ocurrio un error');
       }
    }

    /**
     * Finds the InscripcionExamen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InscripcionExamen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InscripcionExamen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     //Lista las inscripciones a examen
     public function actionListarInscripciones()
     {      
         return $this->render('lista');
     }  
     
     public function actionListarFecha($cod){
 
         $fechas= CalendarioExamen::find()->where(['materia_id'=>$cod])->orderBy('fecha_examen')->all();
 
         echo '<option value="">---Selecciona fecha---</option>';
         foreach ($fechas as $f)
         {
             echo '<option value="'.$f->fecha_examen.'">'.FechaHelper::fechaDMY($f->fecha_examen).'</option>';
         }
 
     }
 
     public function actionConsultar($cod,$fecha)
     {  
        $activo=1; 
        $sql='SELECT m.id,m.descripcion as materia , COUNT(i.materia_id) AS cant FROM inscripcion_examen as i JOIN materia as m on m.id=i.materia_id WHERE i.materia_id=:materia AND i.fecha_examen=:fecha_examen AND i.estado=:estado GROUP BY m.id,materia';
        $materia= \Yii::$app->db->createCommand($sql);
        $materia->bindValue(':materia', $cod);
        $materia->bindValue(':fecha_examen', $fecha);
        $materia->bindValue(':estado', $activo);
        $html = '<div class="box">';
        $html .='<div class="box-body">';
        $html .= '<table class="table table-condensed">';
        $html .='<tbody>';
        $html .='<tr>';       
        $html .='<th>Materia</th>';                      
        $html .='<th>Cantidad Alumnos</th>';
        $html .='<th></th>'; 
        $html .='</tr>';
        if($model=$materia->queryAll()){
         //echo json_encode($model);
         foreach ($model as $value) {
             $html .='<tr>';
             $html .= Html::tag('td', $value['materia']);
             $html .= Html::tag('td', $value['cant']);   
             $html .= '<td><a href="#"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a></td>';         
             $html .='</tr>';
         }
         $html .='</tbody>';
         $html .='</table>';
         $html .='</div>';
         $html .='</div>';
         echo $html;
        }else{
            echo 'No se encontraron resultados.';
        }      
      
     }
}

<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\search\UserSearch;
use backend\models\Sede;
use backend\models\UsuarioSede;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\UserException;
use yii\filters\VerbFilter;
use backend\models\Perfil;
use common\models\AuthAssignment;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->setPassword($model->password);
            $model->generateAuthKey();    
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionActivate($id)
    {
        /* @var $user User */
        $user = $this->findModel($id);
        if ($user->status == User::STATUS_INACTIVE) {
            $user->status = User::STATUS_ACTIVE;
            if ($user->save()) {
                 return $this->redirect(['index']);
            } else {
                $errors = $user->firstErrors;
                throw new UserException(reset($errors));
            }
        }
        return $this->goHome();
    }

    public function actionDesactivar($id)
    {
        /* @var $user User */
        $user = $this->findModel($id);
        if ($user->status == User::STATUS_ACTIVE) {
            $user->status = User::STATUS_INACTIVE;
            if ($user->save()) {
                 return $this->redirect(['index']);
            } else {
                $errors = $user->firstErrors;
                throw new UserException(reset($errors));
            }
        }
        return $this->goHome();
    }

    public function actionCreate()
    {
        $model = new User();
        $perfil = new Perfil();
        $role= new AuthAssignment();
        $model->scenario='create';

        if ($model->load(Yii::$app->getRequest()->post()) && $perfil->load(Yii::$app->getRequest()->post()) ) {
            $model->setPassword($model->password);
            $model->generateAuthKey();
            //echo $model->role;            
            //die;
            if ($model->save()) {
                $perfil->user_id = $model->id;
                $perfil->save();
                $role->item_name= $model->role;
                $role->user_id = $model->id;
                $role->created_at= time();
                $role->save();
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                'model' => $model,
                'perfil' => $perfil,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $perfil = $this->findPerfil($model->id);
        $role = $this->findRole($model->id);
        $model->scenario='update';

        if ($model->load(Yii::$app->getRequest()->post()) && $perfil->load(Yii::$app->getRequest()->post()) && $role->load(Yii::$app->getRequest()->post()) ) {
            $model->role= $role->item_name;           
          
            if ($model->save()) {                
                $perfil->save();
                $role->save();
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                'model' => $model,
                'perfil' => $perfil,
                'role'=>$role,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAsignarSede($id)
    {
        $model = new UsuarioSede();
        $model->user_id = $id;
        $user = User::findOne($id);
        $sedes = Sede::find()->all();
        $dataProvider = new ActiveDataProvider([
                'query' => UsuarioSede::find()->where(['user_id'=>$id]),
            ]);

        if(Yii::$app->request->isPjax)
        {
             return $this->render('asignar_sede', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'sedes'=>$sedes,
                'user' => $user,
            ]);        
        }
        return $this->render('asignar_sede', [
                'model' => $model,
                'dataProvider' => $dataProvider,
                'sedes'=>$sedes,
                'user' => $user,
        ]);
    }

    public function actionSaveSede()
    {
        $model = new UsuarioSede();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->getRequest()->post()))
        {
            if(count(UsuarioSede::find()->where(['sede_id'=> $model->sede_id, 'user_id'=> $model->user_id])->all())>0)
            {
                return '0';
            }
            if($model->validate() && $model->save())
            {
                return '1';
            }
            return '0';
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRemoveSede($id, $user_id)
    {
        $model = UsuarioSede::findOne($id);
        $model->delete();

        return $this->redirect(['asignar-sede', 'id' => $user_id]);
    }
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findPerfil($id)
    {
        if (($model = Perfil::findOne(['user_id'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findRole($id)
    {
        if (($model = AuthAssignment::findOne(['user_id'=>$id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

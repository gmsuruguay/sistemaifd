<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\ChangePassword;
use frontend\models\ActivarCuentaUser;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use backend\models\Alumno;
use common\models\AuthAssignment;
use yii\widgets\ActiveForm;
use backend\models\CalendarioAcademico;
use backend\models\Perfil;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {        
        return $this->redirect(['/alumno/index']);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    /*public function actionLogin()
    {
        $this->layout='login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();        
            
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionLogin()
    {
        $this->layout='login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) ) {

            $user= User::findByUsername($model->username);      
            
            if($user==null){
                throw new NotFoundHttpException('Este usuario no existe');
            }
                         
            if($user->role=='ALUMNO'){
                if($model->login()){
                    return $this->goBack();
                }else{
                    return $this->render('login', [
                        'model' => $model,
                    ]);
                }
                
            }else {                
                throw new HttpException(403, 'Usted no esta autorizado para entrar a esta sección');
            }               
                             
            
        } else{
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        
        
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionPreinscripcion()
    {
        if ( CalendarioAcademico::estaHabilitado('PREINSCRIPCION') ) {
            return $this->render('preinscripcion');
        }else{
            Yii::$app->session->setFlash('error', 'Lo sentimos, todavia no inicio el periodo de inscripción');
            return $this->goHome();
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    
    public function actionValidation()
    {
        $model = new SignupForm();       

        if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);
        }        

    }

    public function actionSignup()
    {
        if ( CalendarioAcademico::estaHabilitado('PREINSCRIPCION') ) {
            $model = new SignupForm();
            $alumno = new Alumno();
            $user = new User();
            $role= new AuthAssignment();    
            $perfil=  new Perfil(); 

            if ($model->load(Yii::$app->getRequest()->post())  ) {
                
                $user->username = $model->numero; 
                $user->email= $model->email;
                $user->role='ALUMNO';
                $user->created_at= time();
                $user->updated_at= time();
                $user->setPassword($model->password);
                $user->generateAuthKey();
                $user->status=0;
                //echo $model->role;            
                //die;
                if ($user->save()) {
                    
                    $alumno->apellido = $model->apellido;
                    $alumno->nombre = $model->nombre;
                    $alumno->tipo_doc = $model->tipo_doc;
                    $alumno->numero = $model->numero;
                    $alumno->email = $user->email;
                    $alumno->user_id= $user->id;
                    $alumno->save();                

                    $role->item_name= $user->role;
                    $role->user_id = $user->id;
                    $role->created_at= time();
                    $role->save();

                    $perfil->nombre= $alumno->nombre;
                    $perfil->apellido= $alumno->apellido;
                    $perfil->user_id=$user->id;
                    $perfil->estado=0;
                    $perfil->save();

                    if ($model->sendEmail()) {
                        Yii::$app->session->setFlash('success', 'Revise su correo electrónico para obtener más instrucciones.');
        
                        return $this->goHome();
                    } else {
                        Yii::$app->session->setFlash('error', 'Lo sentimos, ocurrio un error');
                    }
                    
                }
            }

            return $this->render('signup', [
                    'model' => $model,                
            ]);
        }else{
            Yii::$app->session->setFlash('error', 'Lo sentimos, todavia no inicio el periodo de inscripción');
            return $this->goHome();
        }
    }

    public function actionActivarCuenta($token)
    {
        try {
            $model = new ActivarCuentaUser($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->activar()) {
            Yii::$app->session->setFlash('success', 'Su cuenta se activo exitosamente, ahora puede ingresar al sistema ingresando con su dni como usuario y la contraseña que registro en el sistema.');

            return $this->goHome();
        }        
    }


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Revise su correo electrónico para obtener más instrucciones.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Lo sentimos, no podemos restablecer la contraseña de la dirección de correo electrónico proporcionada.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Su nueva contraseña se guardo exitosamente.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Reset password
     * @return string
     */
     public function actionChangePassword()
     {
         $model = new ChangePassword();
         if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
             Yii::$app->getSession()->setFlash('success', 'Cambio de contraseña registrado correctamente.');
             return $this->goHome();           
         }
 
         return $this->render('change-password', [
                 'model' => $model,
         ]);
     }
}

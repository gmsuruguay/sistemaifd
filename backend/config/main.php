<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'language' => 'es',
    'id' => 'app-backend',
    'name'=>'SURI - SISTEMA UNICO DE REGISTRO INTITUCIONAL',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',   
            'controllerMap' => [
                     'assignment' => [
                        'class' => 'mdm\admin\controllers\AssignmentController',
                        //'userClassName' => 'app\models\User',
                        'idField' => 'user_id',
                        'usernameField' => 'username',
                        'fullnameField' => 'perfil.nombre',
                        'extraColumns' => [
                            [
                                'attribute' => 'apellido',
                                'label' => 'Apellido',
                                'value' => function($model, $key, $index, $column) {
                                    return $model->perfilApellido;
                                },
                            ], 
                            [
                                'attribute' => 'nombre',
                                'label' => 'Nombre',
                                'value' => function($model, $key, $index, $column) {
                                    return $model->perfilNombre;
                                },
                            ],                        
                        ],
                        
                        //'searchClass' => 'app\models\UserSearch'
                    ],
                ],     
             ]    
    ],
    'components' => [       
        
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
            ],
    
            'user' => [
            
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['admin/user/login'],
        ], 
        'view' => [
         'theme' => [
             'pathMap' => [
                    '@app/views' => '@backend/views'
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue',
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],

    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //'site/*', //Permisos permitidos solo de manera temporal por que no existen usuarios           
            'site/logout',
            'admin/user/request-password-reset',
            'admin/user/signup',
            'gii/*',
            'admin/user/reset-password',          

        ]
    ],
    'params' => $params,
];

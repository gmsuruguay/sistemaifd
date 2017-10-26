<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'language' => 'es',
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'authManager' => [
        'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],    
        'user' => [        
        'identityClass' => 'common\models\User',
        'loginUrl' => ['site/login'],
        'enableAutoLogin' => true,
        'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ], 
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],*/
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
             //Permisos permitidos solo de manera temporal por que no existen usuarios     
            'gii/*',//Permitir solo en desarrollo.                 
            'site/logout',
            'site/change-password',
            'admin/user/request-password-reset',            
            'admin/user/reset-password',                   


        ]
    ],
    'params' => $params,
];

<?php
return [    
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',    
    'timeZone' => 'America/Argentina/Jujuy',
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
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'authManager' => [
        'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],

        'user' => [
        
        'identityClass' => 'mdm\admin\models\User',
        'loginUrl' => ['admin/user/login'],
        ],
    ],

    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*', //Permisos permitidos solo de manera temporal por que no existen usuarios           
            'site/logout',
            'admin/user/request-password-reset',
            'admin/user/signup',
            'gii/*',
            'admin/user/reset-password',          

        ]
    ]
];

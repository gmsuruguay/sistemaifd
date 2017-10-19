<?php
use kartik\mpdf\Pdf;

return [    
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',    
    'timeZone' => 'America/Argentina/Jujuy',
    'modules' => [
    'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
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

        'pdf' => [
            'class' => Pdf::classname(),
            // set to use core fonts only
            'mode' => Pdf::MODE_BLANK, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,         
    
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,       
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssInline' => '.kv-heading-1{font-size:18px} ',        
           
        ],

        
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
    ]
];

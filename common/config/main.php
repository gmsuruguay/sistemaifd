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
    
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
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

    
];

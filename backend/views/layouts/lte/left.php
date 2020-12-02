<?php

use backend\models\Perfil;
use common\models\User;
use mdm\admin\components\Helper;
use yii\helpers\Html;

$identity = Yii::$app->user->identity;
?>
<aside class="main-sidebar">

    <section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x" style="color: grey"></i>
        <i class="fa fa-user fa-stack-1x fa-inverse"></i>
      </span>              
      </div>
      <div class="pull-left info">
        <p></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    
    <?php
    $menuItems= [
      ['label' => 'Menu Yii2', 'visible' => false, 'options' => ['class' => 'header']],     
       
      [
        'label' => 'Tramites',
        'icon' => 'book',
        'url' => '#',
        'items' => [
            ['label' => 'Mis Trámites', 'icon' => 'file', 'url' => ['/tramite/index']],  
            ['label' => 'En Tránsito', 'icon' => 'file-text', 'url' => ['/tramite/transito'],           
            ],
            /*['label' => 'Procesados', 'icon' => 'file-text', 'url' => ['/tramite/mis-tramites'],           
            ],*/
            ['label' => 'Otros Trámites', 'icon' => 'file-text', 'url' => ['/tramite/otros-tramites'],                      
            ]                        
          ],
      ], 
      ['label' => 'Personas', 'icon' => 'user', 'url' => ['/iniciador/index']],
      ['label' => 'Asuntos', 'icon' => 'list', 'url' =>  ['/asunto/index'],
      
      ], 
      [
        'label' => 'Configuración',
        'icon' => 'cog',
        'url' => '#',
        
        'items' => [
            [
              'label' => 'Seguridad',
              'icon' => 'lock',
              'url' => '#',
              'items' => [
                ['label' => 'Usuarios', 'icon' => 'users', 'url' =>  ['/usuario/index'],],  
                ['label' => 'Roles', 'icon' => 'list', 'url' =>  ['/admin/role'],],  
                ['label' => 'Rutas', 'icon' => 'link', 'url' =>  ['/admin/route'],],                
                ]                     
              
            ],             
            ['label' => 'Estados', 'icon' => 'list', 'url' =>  ['/estado/index'],],             
            ['label' => 'Reparticiones / Dpto.', 'icon' => 'building-o', 'url' =>  ['/reparticion/index'],],   
            ['label' => 'Numeración de Tramites', 'icon' => 'edit', 'url' =>  ['/numeracion-tramite/index'],],               
        ],
      ],        
    ];
   
    ?>
    <?= dmstr\widgets\Menu::widget(
      [
        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
        'items' =>$menuItems
      ]
    ) ?>      

    </section>

</aside>

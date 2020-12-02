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

    $menuItems = [
      ['label' => 'Menu', 'options' => ['class' => 'header']],     
      ['label' => 'Inicio', 'icon' => 'home', 'url' => ['/site']],  
      ['label' => 'Carreras', 'icon' => 'certificate', 'url' => ['/carrera']],   
      ['label' => 'Materias', 'icon' => 'leanpub', 'url' => ['/materia']],    
     
      [
          'label' => 'Alumnos',
          'icon' => 'graduation-cap',
          'url' => '#',
          'items' => [         
              ['label' => 'Listar Alumnos Inscriptos', 'icon' => 'user', 'url' => ['/inscripcion'],],                   
              ['label' => 'Administrar Alumnos', 'icon' => 'users', 'url' => ['/alumno'],],                             
              ['label' => 'Listar Titulos', 'icon' => 'vcard-o', 'url' => ['/titulo-secundario'],],    
              ['label' => 'Listar Colegios Secundarios', 'icon' => 'university', 'url' => ['/colegio-secundario'],],                             
          ],
      ], 
      [
          'label' => 'Cursadas',
          'icon' => 'rocket',
          'url' => '#',
          'items' => [                            
              ['label' => 'Listar Inscripciones', 'icon' => 'list', 'url' => ['/cursada'],],
              ['label' => 'Registrar Cierre Cursada', 'icon' => 'edit', 'url' => ['/cursada/cerrar-cursada'],],                            
          ],
      ],
      [
          'label' => 'Examen',
          'icon' => 'newspaper-o',
          'url' => '#',
          'items' => [                            
              ['label' => 'Listar Permisos solicitados', 'icon' => 'list', 'url' => ['/inscripcion-examen'],],
              ['label' => 'Imprimir Listado', 'icon' => 'print', 'url' => ['/inscripcion-examen/listar-inscripciones'],],
              ['label' => 'Calendario Examen', 'icon' => 'calendar', 'url' => ['/calendario-examen'],],                                
              ['label' => 'Turno Examen', 'icon' => 'list', 'url' => ['/turno-examen'],],                         ],
      ],
      
      [
          'label' => 'Actas',
          'icon' => 'book',
          'url' => '#',
          'items' => [                            
              ['label' => 'Listar Folios', 'icon' => 'list', 'url' => ['/acta'],],
              ['label' => 'Registrar Actas Historicas', 'icon' => 'plus', 'url' => ['/acta/create'],],    
              ['label' => 'Registrar Actas con Inscripción', 'icon' => 'plus', 'url' => ['/acta/load-from-inscripto']],                          
          ],
      ],  
      [
          'label' => 'Docentes',
          'icon' => 'user',
          'url' => '#',
          'items' => [                            
              ['label' => 'Listar Docentes', 'icon' => 'list', 'url' => ['/docente'],],
              ['label' => 'Agregar Docente', 'icon' => 'plus', 'url' => ['/docente/create'],],    
              ['label' => 'Listar Titulos Docentes', 'icon' => 'vcard-o', 'url' => ['/titulo']],                          
          ],
      ],  
      ['label' => 'Solicitudes Certificados', 'icon' => 'file', 'url' => ['/pedido']], 
      ['label' => 'Localidades', 'icon' => 'map-marker', 'url' => ['/localidad']], 
      ['label' => 'Condición Cursada', 'icon' => 'question-circle', 'url' => ['/condicion']], 
      ['label' => 'Calendario Académico', 'icon' => 'calendar', 'url' => ['/calendario-academico'],],  
                                     
    
      [
          'label' => 'Configuración',
          'icon' => 'cog',
          'url' => '#',
          'items' => [
              ['label' => 'Sedes', 'icon' => 'university', 'url' => ['/sede'],],
              ['label' => 'Usuarios', 'icon' => 'users', 'url' => ['/user'],],
              ['label' => 'Controladores', 'icon' => 'code', 'url' => ['/admin/route'],],
              ['label' => 'Roles', 'icon' => 'lock', 'url' => ['/admin/role'],],
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

<?php
use  yii\web\Session;
use backend\models\Sede;
?>
<aside class="main-sidebar">

    <section class="sidebar">      
        <!-- Sidebar user panel -->
        <div class="user-panel">
            
            <div class="app-info text-center">
                <p><b><?php
                 if(Yii::$app->user->identity->role=='PRECEPTOR'){
                 $session = Yii::$app->session;
                 $sede_id = $session->get('sede');
                 echo Sede::getNombre($sede_id);
                 }
                ?></b></p>              
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    //['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Inicio', 'icon' => 'fa fa-home', 'url' => ['/site']],  
                    ['label' => 'Carreras', 'icon' => 'fa fa-certificate', 'url' => ['/carrera']],   
                    ['label' => 'Materias', 'icon' => 'fa fa-leanpub', 'url' => ['/materia']],   
                    
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest], 
                    
                    [
                        'label' => 'Alumnos',
                        'icon' => 'fa fa-graduation-cap',
                        'url' => '#',
                        'items' => [         
                            ['label' => 'Listar Alumnos Inscriptos', 'icon' => 'fa fa-user', 'url' => ['/inscripcion'],],                   
                            ['label' => 'Administrar Alumnos', 'icon' => 'fa fa-users', 'url' => ['/alumno'],],                             
                            ['label' => 'Listar Titulos', 'icon' => 'fa fa-vcard-o', 'url' => ['/titulo-secundario'],],    
                            ['label' => 'Listar Colegios Secundarios', 'icon' => 'fa fa-university', 'url' => ['/colegio-secundario'],],                             
                        ],
                    ], 
                    [
                        'label' => 'Cursadas',
                        'icon' => 'fa fa-rocket',
                        'url' => '#',
                        'items' => [                            
                            ['label' => 'Listar', 'icon' => 'fa fa-list', 'url' => ['/cursada'],],
                            ['label' => 'Registrar Cierre Cursada', 'icon' => 'fa fa-edit', 'url' => ['/cursada/cerrar-cursada'],],                            
                        ],
                    ],
                    
                    [
                        'label' => 'Actas',
                        'icon' => 'fa fa-book',
                        'url' => '#',
                        'items' => [                            
                            ['label' => 'Listar Folios', 'icon' => 'fa fa-list', 'url' => ['/acta'],],
                            ['label' => 'Registrar Actas Historicas', 'icon' => 'fa fa-plus', 'url' => ['/acta/create'],],    
                            ['label' => 'Registrar Actas con Inscripción', 'icon' => 'fa fa-plus', 'url' => ['/acta/load-from-inscripto']],                          
                        ],
                    ],  
                    [
                        'label' => 'Docentes',
                        'icon' => 'fa fa-user',
                        'url' => '#',
                        'items' => [                            
                            ['label' => 'Listar Docentes', 'icon' => 'fa fa-list', 'url' => ['/docente'],],
                            ['label' => 'Agregar Docente', 'icon' => 'fa fa-plus', 'url' => ['/docente/create'],],    
                            ['label' => 'Listar Titulos Docentes', 'icon' => 'fa fa-vcard-o', 'url' => ['/titulo']],                          
                        ],
                    ],  
                    ['label' => 'Solicitudes Certificados', 'icon' => 'fa fa-file', 'url' => ['/pedido']], 
                    ['label' => 'Localidades', 'icon' => 'fa fa-map-marker', 'url' => ['/localidad']], 
                    ['label' => 'Condición Cursada', 'icon' => 'fa fa-question-circle', 'url' => ['/condicion']], 
                    ['label' => 'Calendario Académico', 'icon' => 'fa fa-calendar', 'url' => ['/calendario-academico'],],  
                    ['label' => 'Calendario Examen', 'icon' => 'fa fa-calendar', 'url' => ['/calendario-examen'],],                                
                    ['label' => 'Turno Examen', 'icon' => 'fa fa-list', 'url' => ['/turno-examen'],],                                
                  
                    [
                        'label' => 'Configuración',
                        'icon' => 'fa fa-cog',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Sedes', 'icon' => 'fa fa-university', 'url' => ['/sede'],],
                            ['label' => 'Usuarios', 'icon' => 'fa fa-users', 'url' => ['/user'],],
                            ['label' => 'Controladores', 'icon' => 'fa fa-code', 'url' => ['/admin/route'],],
                            ['label' => 'Roles', 'icon' => 'fa fa-lock', 'url' => ['/admin/role'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

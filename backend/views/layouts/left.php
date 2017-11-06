<aside class="main-sidebar">

    <section class="sidebar">      
        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    //['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Inicio', 'icon' => 'fa fa-home', 'url' => ['/site']],  
                    ['label' => 'Carreras', 'icon' => 'fa fa-certificate', 'url' => ['/carrera']],                   
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest], 
                    [
                        'label' => 'Inscripciones a Carrera',
                        'icon' => 'fa fa-pencil-square-o',
                        'url' => '#',
                        'items' => [                            
                            ['label' => 'Listar', 'icon' => 'fa fa-list', 'url' => ['/inscripcion'],],
                           
                        ],
                    ],
                    [
                        'label' => 'Alumnos',
                        'icon' => 'fa fa-graduation-cap',
                        'url' => '#',
                        'items' => [                            
                            ['label' => 'Listar Alumnos', 'icon' => 'fa fa-list', 'url' => ['/alumno'],],
                            ['label' => 'Agregar Alumno', 'icon' => 'fa fa-plus', 'url' => ['/alumno/create'],],   
                            ['label' => 'Listar Titulos', 'icon' => 'fa fa-vcard-o', 'url' => ['/titulo-secundario'],],    
                            ['label' => 'Listar Colegios Secundarios', 'icon' => 'fa fa-university', 'url' => ['/colegio-secundario'],],                             
                        ],
                    ], 
                    /*[
                        'label' => 'Cursadas',
                        'icon' => 'fa fa-rocket',
                        'url' => '#',
                        'items' => [                            
                            ['label' => 'Listar', 'icon' => 'fa fa-list', 'url' => ['/cursada'],],
                            ['label' => 'Agregar', 'icon' => 'fa fa-plus', 'url' => ['/cursada/create'],],                            
                        ],
                    ],*/ 
                    
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

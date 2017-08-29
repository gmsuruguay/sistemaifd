<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/user.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=  Yii::$app->user->identity->perfilNombre.' '.Yii::$app->user->identity->perfilApellido  ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    //['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Inicio', 'icon' => 'fa fa-home', 'url' => ['/site']],                   
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],                   
                    [
                        'label' => 'Usuarios',
                        'icon' => 'fa fa-users',
                        'url' => '#',
                        'items' => [
                            //['label' => 'Listar', 'icon' => 'fa fa-list', 'url' => ['/admin/user'],],
                            ['label' => 'Listar', 'icon' => 'fa fa-list', 'url' => ['/user'],],
                            ['label' => 'Controladores', 'icon' => 'fa fa-code', 'url' => ['/admin/route'],],
                            ['label' => 'Roles', 'icon' => 'fa fa-lock', 'url' => ['/admin/role'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

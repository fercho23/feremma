<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        @if(Auth::check())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('dist/img/avatar'.(Auth::user()->sex == 'm' ? '5' : '2').'.png') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>
                        {!! Auth::user()->username !!}
                    </p>
                    <small>
                        {!! Auth::user()->role->name !!}
                    </small>
                </div>
            </div>
        @endif

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            @if(Auth::check())
                <li class="header">MENÚ</li>
                @include('includes.partials.section', ['model'=>'users',
                                                       'title'=>'Usuarios',
                                                       'icon'=>'users',
                                                       'actions'=>['index', 'create'],
                                                       'names'=>['Ver', 'Nuevo'],
                                                       'icons'=>['list-ol', 'user-plus']])

                @include('includes.partials.section', ['model'=>'roles',
                                                       'title'=>'Cargos',
                                                       'icon'=>'shield',
                                                       'actions'=>['index', 'create'],
                                                       'names'=>['Ver', 'Nuevo'],
                                                       'icons'=>['list-ol', 'plus']])

                @include('includes.partials.section', ['model'=>'reservations',
                                                       'title'=>'Reservas',
                                                       'icon'=>'suitcase',
                                                       'actions'=>['index', 'create', 'index-check-in', 'index-check-out'],
                                                       'names'=>['Ver', 'Nueva', 'Check In', 'Check Out'],
                                                       'icons'=>['list-ol', 'plus', 'calendar-check-o', 'calendar-times-o']])

                @include('includes.partials.section', ['model'=>'rooms',
                                                       'title'=>'Habitaciones',
                                                       'icon'=>'h-square',
                                                       'actions'=>['index', 'create'],
                                                       'names'=>['Ver', 'Nueva'],
                                                       'icons'=>['list-ol', 'plus']])

                @include('includes.partials.section', ['model'=>'distributions',
                                                       'title'=>'Distribuciones',
                                                       'icon'=>'map-signs',
                                                       'actions'=>['index', 'create'],
                                                       'names'=>['Ver', 'Nueva'],
                                                       'icons'=>['list-ol', 'plus']])

                @include('includes.partials.section', ['model'=>'beds',
                                                       'title'=>'Camas',
                                                       'icon'=>'bed',
                                                       'actions'=>['index', 'create'],
                                                       'names'=>['Ver', 'Nueva'],
                                                       'icons'=>['list-ol', 'plus']])

                @include('includes.partials.section', ['model'=>'services',
                                                       'title'=>'Servicios',
                                                       'icon'=>'glass',
                                                       'actions'=>['index', 'create'],
                                                       'names'=>['Ver', 'Nuevo'],
                                                       'icons'=>['list-ol', 'plus']])

                @include('includes.partials.section', ['model'=>'tasks',
                                                       'title'=>'Tareas',
                                                       'icon'=>'tags',
                                                       'actions'=>['index', 'create', 'create-mine'],
                                                       'names'=>['Ver', 'Nueva', 'Nueva Tarea Para mi Sector'],
                                                       'icons'=>['list-ol', 'plus', 'plus-circle']])

                @include('includes.partials.section', ['model'=>'permissions',
                                                       'title'=>'Permisos',
                                                       'icon'=>'hand-paper-o',
                                                       'actions'=>['index'],
                                                       'names'=>['Ver'],
                                                       'icons'=>['list-ol']])

                @include('includes.partials.section', ['model'=>'reports',
                                                       'title'=>'Reportes',
                                                       'icon'=>'fa fa-file-text',
                                                       'actions'=>['index'],
                                                       'names'=>['Ver'],
                                                       'icons'=>['fa fa-file-text-o']])
            @endif

            <li class="header">SOPORTE</li>
            <li>
                <a href="documentation/index.html">
                    <i class="fa fa-book"></i> Ayuda
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-circle-o text-info"></i> Acerca de...
                </a>
            </li>
            <li class="header">PROYECTO</li>
            <li>
                <a target="_blank" href="https://drive.google.com/open?id=0B1_QXCJvjcF2fllFY2RpcHc4MDlfN2s3T1FMaWtkZGxCRmJMc0RaRFBxVV95S0E4SUUwR2s">
                    <i class="fa fa-book"></i> Documentación
                </a>
            </li>
            <li>
                <a target="_blank" href="http://localhost/feremma/doxy/html/">
                    <i class="fa fa-file-text-o"></i> Doxygen
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
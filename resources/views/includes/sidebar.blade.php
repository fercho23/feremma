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

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">

            @if(Auth::check())

                <li class="header">MENÚ</li>
                @include('includes.partials.section', ['model'=>'users', 'title'=>'Usuarios'])
                @include('includes.partials.section', ['model'=>'roles', 'title'=>'Cargos'])
                @include('includes.partials.section', ['model'=>'reservations', 'title'=>'Reservas'])
                @include('includes.partials.section', ['model'=>'rooms', 'title'=>'Habitaciones'])
                @include('includes.partials.section', ['model'=>'services', 'title'=>'Servicios'])
                @include('includes.partials.section', ['model'=>'tasks', 'title'=>'Tareas'])
                @include('includes.partials.section', ['model'=>'permissions', 'title'=>'Permisos'])

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
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
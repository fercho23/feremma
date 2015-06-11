<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Emmanuel Sanchez</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
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
            <li class="header">MENÚ</li>

            <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/users')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
                    <li><a href="{{URL::to('/users/create')}}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Cargos</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/posts')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
                    <li><a href="{{URL::to('/posts/create')}}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Reservas</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/reservations')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
                    <li><a href="{{URL::to('/reservations/create')}}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Habitaciones</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/rooms')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
                    <li><a href="{{URL::to('/rooms/create')}}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Servicios</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/services')}}"><i class="fa fa-circle-o"></i> Ver</a></li>
                    <li><a href="{{URL::to('/services/create')}}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="header">SOPORTE</li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> Ayuda</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Acerca de...</a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
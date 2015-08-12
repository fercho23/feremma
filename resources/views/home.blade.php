@extends('app')
    @section('content')
        @include('flash::message')
        @include('includes.if-authorized', ['conditions'=> array('rol'=>array('Super Usuario','Director','Recepcion y Conserjeria')),'include'=>'includes.stats', 'parameters'=>[]])
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- TO DO Lists -->
                @include('includes.if-authorized', ['conditions'=> array('rol'=>array('Super Usuario','Director')),'include'=>'tasks.manage', 'parameters'=>['title'=>'Estado de tareas globales']])
                @include('includes.if-authorized', ['conditions'=> array('and'=>array('tasks/mine','tasks/createMine')),'include'=>'tasks.mine', 'parameters'=>['state'=>'pendiente','title'=>'Tareas Pendientes', 'today'=>null]])
                @include('includes.if-authorized', ['conditions'=> array('and'=>array('tasks/mine','tasks/createMine')),'include'=>'tasks.mine', 'parameters'=>['state'=>'en proceso','title'=>'Mis Tareas En Proceso', 'today'=>null]])
                @include('includes.if-authorized', ['conditions'=> array('and'=>array('tasks/mine','tasks/createMine')),'include'=>'tasks.mine', 'parameters'=>['state'=>'finalizada','title'=>'Mis Tareas Finalizadas (en las últimas 24 hs)', 'today'=>'24h']])
                @include('includes.if-authorized', ['conditions'=> array('and'=>array('tasks/mine','tasks/createMine')),'include'=>'tasks.delay', 'parameters'=>['title'=>'Tareas Atrasadas (con mas de usa semana)']])
                <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger">8 New Members</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <li>
                          <img src="dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander Pierce</a>
                          <span class="users-list-date">Today</span>
                        </li>
                        <li>
                          <img src="dist/img/user8-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Norman</a>
                          <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                          <img src="dist/img/user7-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Jane</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user6-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">John</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user2-160x160.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Alexander</a>
                          <span class="users-list-date">13 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user5-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Sarah</a>
                          <span class="users-list-date">14 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user4-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nora</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user3-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                @include('includes.if-authorized', ['conditions'=> array('rol'=>array('Super Usuario','Director','Recepcion y Conserjeria','Pisos','Mantenimiento, servicios técnicos y seguridad:')),'include'=>'rooms.state', 'parameters'=>['title'=>'Estado de Habitaciones']])
                {{--@include('includes.if-authorized', ['conditions'=> array('rol'=>array('Super Usuario','Director','Recepcion y Conserjeria','Pisos','Mantenimiento, servicios técnicos y seguridad:')),'include'=>'mail.write', 'parameters'=>['title'=>'Envío de Emails']])--}}
            </section><!-- right col -->
        </div><!-- /.row (main row) -->
    @endsection
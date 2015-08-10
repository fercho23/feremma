@extends('app')
    @section('content')
        @include('flash::message')
        @include('includes.if-authorized', ['conditions'=> array('rol'=>array('Super Usuario','Director','Recepcion y Conserjeria')),'include'=>'includes.stats', 'parameters'=>[]])
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- TO DO Lists -->
                @include('includes.if-authorized', ['conditions'=> array('and'=>array('tasks/mine','tasks/createMine')),'include'=>'tasks.mine', 'parameters'=>['state'=>'pendiente','title'=>'Tareas Pendientes', 'last'=>null]])
                @include('includes.if-authorized', ['conditions'=> array('and'=>array('tasks/mine','tasks/createMine')),'include'=>'tasks.mine', 'parameters'=>['state'=>'en proceso','title'=>'Mis Tareas En Proceso', 'last'=>null]])
                @include('includes.if-authorized', ['conditions'=> array('and'=>array('tasks/mine','tasks/createMine')),'include'=>'tasks.mine', 'parameters'=>['state'=>'finalizada','title'=>'Mis Tareas Finalizadas (en las últimas 24 hs)', 'last'=>'24h']])
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                @include('includes.if-authorized', ['conditions'=> array('rol'=>array('Super Usuario','Director')),'include'=>'tasks.manage', 'parameters'=>['title'=>'Estado de tareas globales']])
                @include('includes.if-authorized', ['conditions'=> array('rol'=>array('Super Usuario','Director','Recepcion y Conserjeria','Pisos','Mantenimiento, servicios técnicos y seguridad:')),'include'=>'rooms.state', 'parameters'=>['title'=>'Estado de Habitaciones']])
                {{--@include('includes.if-authorized', ['conditions'=> array('rol'=>array('Super Usuario','Director','Recepcion y Conserjeria','Pisos','Mantenimiento, servicios técnicos y seguridad:')),'include'=>'mail.write', 'parameters'=>['title'=>'Envío de Emails']])--}}
            </section><!-- right col -->
        </div><!-- /.row (main row) -->
    @endsection
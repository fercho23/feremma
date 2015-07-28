<!-- Calendar -->
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">{!!$title!!}</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="{{URL('tasks/create')}}">Nueva...</a></li>
                                    <li><a href="{{URL('tasks')}}">Listado completo</a></li>                                    
                                </ul>
                            </div>
                            <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->

                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div><!-- /.box-body -->
                    <div class="box-footer text-black">
                        <div class="row">
                            <?php 
                                $tasks=(new FerEmma\Task)->forToday(); 
                                $x=0;
                                $y=0;
                            ?>
                            @if (sizeof($tasks)>0)
                                <div class="col-sm-6">
                                    <!-- Progress bars -->                                    
                                        @foreach ($tasks as $task)
                                            <?php $x++; ?>
                                            @if(($x % 2)!=0)                                                
                                                @include('tasks.manage.task')
                                                @if($task->state=='pendiente')
                                                    @include('tasks.manage.progress_none')
                                                @endif
                                                @if($task->state=='en proceso')
                                                    @include('tasks.manage.progress_half')
                                                @endif
                                                @if($task->state=='realizada')
                                                    @include('tasks.manage.progress_complete')
                                                @endif
                                            @endif
                                        @endforeach
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <!-- Progress bars -->                                    
                                        @foreach ($tasks as $task)
                                            <?php $y++; ?>
                                            @if(($y % 2)==0)
                                                
                                                @include('tasks.manage.task')
                                                @if($task->state=='pendiente')
                                                    @include('tasks.manage.progress_none')
                                                @endif
                                                @if($task->state=='en proceso')
                                                    @include('tasks.manage.progress_half')
                                                @endif
                                                @if($task->state=='realizada')
                                                    @include('tasks.manage.progress_complete')
                                                @endif
                                            @endif
                                        @endforeach
                                </div><!-- /.col -->                            
                            @else
                                <div class="alert alert-success">
                                    <p>No hay tareas.</p>
                                </div>
                            @endif
                        </div><!-- /.row -->
                    </div>
                </div><!-- /.box -->
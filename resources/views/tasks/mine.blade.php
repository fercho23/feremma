        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Mis Tareas</h3>                
            </div><!-- /.box-header -->                    
            <div class="box-body">
                @if (sizeof(Auth::user()->myRolePendingTasks())>0)
                <ul class="todo-list">
                    @foreach (Auth::user()->myRolePendingTasks() as $task)
                    <li>
                        <!-- drag handle -->
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <input type="checkbox" value="" name=""/>
                        <!-- todo text -->
                        <span class="text">{!! $task->name !!}</span>
                        <!-- Emphasis label -->
                        <small class="label label-danger">
                            <i class="glyphicon glyphicon-exclamation-sign"></i> {!! $task->priority !!}
                        </small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </div>
                    </li>
                    @endforeach
                </ul>                
                @else
                    <div class="alert alert-danger">
                        <p>No hay tareas Pendientes!.</p>
                    </div>
                @endif
            </div><!-- /.box-body -->

            <div class="box-footer clearfix no-border">
                <a href="{{ URL('tasks/create_mine') }}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</a>
            </div>
        </div><!-- /.box -->

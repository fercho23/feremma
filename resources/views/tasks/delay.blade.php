<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-clipboard"></i>
        <h3 class="box-title">{!!$title!!}</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php $tasks=Auth::user()->delayTasks(); ?>
        @if (sizeof($tasks)>0)
        <ul class="todo-list">
            @foreach ($tasks as $task)
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

                @if($task->state == 'pendiente')
                    <small class="label label-primary">
                        {!! "Prioridad:"." ".$task->priority !!}
                    </small>
                    <small class="label label-danger">
                        <i class="fa fa-exclamation"></i>
                    </small>
                @endif

                @if($task->state == 'en proceso')
                    <small class="label label-primary">
                        {!! "Prioridad:"." ".$task->priority !!}
                    </small>
                    <small class="label label-warning">
                        <i class="fa fa-spinner"></i>
                    </small>
                @endif

                <!-- General tools such as edit or delete-->
                <div class="tools">
                    @if($task->state == 'pendiente')
                        <a href="{{ URL('tasks/start/'.$task->id) }}" data-toggle="tooltip" data-placement="left" title="Comenzar Tarea"><i class="fa fa-play"></i></a>
                    @endif
                    @if($task->state == 'en proceso')
                        <a href="{{ URL('tasks/end/'.$task->id) }}" data-toggle="tooltip" data-placement="top" title="Finalizar Tarea"><i class="fa fa-check-square-o"></i></a>
                        <a href="{{ URL('tasks/cancel/'.$task->id) }}" data-toggle="tooltip" data-placement="top" title="Cancelar Tarea"><i class="fa fa-stop"></i></a>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
        @else
            <div class="alert alert-success">
                <p>No hay tareas atrasadas!</p>
            </div>
        @endif
    </div><!-- /.box-body -->
</div><!-- /.box -->

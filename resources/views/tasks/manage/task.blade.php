<div class="clearfix">
    <span class="pull-left">{!! $task->name !!} </span>
    <small class="pull-right">{!!$task->state == 'pendiente' ? '0%' : ($task->state == 'en proceso' ? 'En proceso...' : '100%')!!}</small>
</div>
@if($task->state!='pendiente')
	<div class="clearfix">
		<small class="pull-left ">{!! $task->user->role['name'] !!}: {!! $task->user['name'] !!} {!! $task->user['surname'] !!}</small>
	</div>
@endif 
@if($task->state=='pendiente')
    @include('tasks.manage.progress_none')
@endif
@if($task->state=='en proceso')
    @include('tasks.manage.progress_half')
@endif
@if($task->state=='realizada')
    @include('tasks.manage.progress_complete')
@endif
<div class="clearfix">
    <span class="pull-left">{!! $task->name !!}</span>
    <small class="pull-right">{!!$task->state == 'pendiente' ? '0%' : ($task->state == 'en proceso' ? 'En proceso...' : '100%')!!}</small>
</div>
@if(Auth::user()->canAnyActionsByModel($model, ['index', 'create']))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i> <span>{!! $title !!}</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @if(Auth::user()->can($model.'/index'))
                <li><a href="{!! URL::to('/'.$model) !!}"><i class="fa fa-circle-o"></i> Ver</a></li>
            @endif
            @if(Auth::user()->can($model.'/create'))
                <li><a href="{!! URL::to('/'.$model.'/create') !!}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
            @endif
        </ul>
    </li>
@endif
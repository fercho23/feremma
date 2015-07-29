@if(Auth::user()->canAnyActionsByModel($model, $actions))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-{!! (isset($icon) ? $icon : 'edit') !!}"></i> <span>{!! $title !!}</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @foreach ($actions as $k => $v)
                @if(Auth::user()->can($model.'/'.$v))
                    <li>
                        <a href="{!! URL::to($v != 'index' ? '/'.$model.'/'.$v : '/'.$model) !!}">
                            <i class="fa fa-{!! (isset($icons[$k]) && $icons[$k]? $icons[$k] : 'circle-o') !!}"></i> {!! $names[$k] !!}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>
@endif

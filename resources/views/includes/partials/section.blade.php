@if(Auth::user()->canAnyActionsByModel($model, $actions))
    <li class="treeview">
        <a href="#">
            @if(isset($icon))
                @if(is_array($icon))
                    @foreach ($icon as $i)
                        <i class="fa fa-{!! $i !!}"></i>
                    @endforeach
                @else
                    <i class="fa fa-{!! $icon !!}"></i>
                @endif
            @else
                <i class="fa fa-edit"></i>
            @endif
            <span>{!! $title !!}</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @foreach ($actions as $k => $v)
                @if(Auth::user()->can($model.'/'.$v))
                    <li>
                        <a href="{!! URL::to($v != 'index' ? '/'.$model.'/'.$v : '/'.$model) !!}">
                        @if(isset($icons[$k]))
                            @if(is_array($icons[$k]))
                                @foreach ($icons[$k] as $i)
                                    <i class="fa fa-{!! $i !!}"></i>
                                @endforeach
                            @else
                                <i class="fa fa-{!! $icons[$k] !!}"></i>
                            @endif
                        @else
                            <i class="fa fa-edit"></i>
                        @endif
                            {{--
                            <i class="fa fa-{!! (isset($icons[$k]) && $icons[$k]? $icons[$k] : 'circle-o') !!}"></i>
                            --}}
                            {!! $names[$k] !!}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>
@endif

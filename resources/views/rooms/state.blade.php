<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-clipboard"></i>
        <h3 class="box-title">{!!$title!!}</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        
        @if (sizeof(FerEmma\Room::count())>0)
        <ul class="todo-list">
            @foreach (FerEmma\Room::all() as $room)
            <li>
                <!-- drag handle -->
                <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                </span>
                <!-- checkbox -->
                <input type="checkbox" value="" name=""/>
                <!-- todo text -->
                <span class="text">{!! $room->name !!}</span>
                <!-- Emphasis label -->

                @if($room->available == 1)
                    <small class="label label-success">
                        {!! "Disponible:" !!}
                    </small>                    
                @endif

                @if($room->available == 0)
                    <small class="label label-danger">
                        {!! "Fuera de Servicio!" !!}
                    </small>
                    <small class="label label-danger">
                        <i class="fa fa-exclamation"></i>
                    </small>
                @endif
            </li>
            @endforeach
        </ul>
        @else
            <div class="alert alert-warning">
                <p>Aún no hay habitaciones en el sistema!'.</p>
            </div>
        @endif
    </div><!-- /.box-body -->
</div><!-- /.box -->

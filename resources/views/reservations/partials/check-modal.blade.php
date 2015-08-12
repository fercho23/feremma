<div class="modal fade" id="check-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reserva N° <span id="title-check-modal"></span> Check {!! $title !!}</h4>
                <small>El Titular de la Reserva es <span id="title-small-check-modal"></span></small>
            </div>
            {!! Form::model($reservation, ['method' => 'POST',
                                           'route' => ['reservations-check-'.$type, $reservation->id]]) !!}
                <div class="modal-body">
                    ¿Esta Seguro que desea hacer el Check {!! $title !!} de la Reserva N° <span id="title-check-modal"></span> que tiene como Titular a <span id="title-small-check-modal"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    {!! Form::submit('Hacer Check '. $title, array('class'=>'btn btn-primary')) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
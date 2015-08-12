<div class="modal fade" id="reservation-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reserva N° <span id="title-reservation-modal"></span></h4>
                <small>Posee una Deuda de <span id="title-small-reservation-modal"></span></small>
            </div>
            {!! Form::model($reservation, ['method' => 'POST',
                                           'route' => ['reservations-reduce-debt', $reservation->id]]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('number','Monto:')!!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-money"></i>
                                <i class="fa fa-usd"></i>
                            </span>
                            {!! Form::input('number', 'number', null, ['class'=>'form-control',
                                                                       'id'=>'number',
                                                                       'max'=>'9999999999',
                                                                       'min'=>'0',
                                                                       'step'=>'0.01']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit('Reducir Deuda', array('class'=>'btn btn-primary')) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
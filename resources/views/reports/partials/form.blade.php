<!-- Form Entre Fechas -->
  <div id="form" class="box box-danger">
    <div class="box-header with-border">
      <h3 id="form-title" class="box-title">Generar Informe</h3>
    </div>
    <div class="box-body">
      <div class="row">
        {!! Form::open(['url'=>'reports/generate']) !!}
        {!! Form::hidden('reporttype', '', array('id' => 'reporttype')) !!}
        {!! Form::hidden('reporttitle', '', array('id' => 'reporttitle')) !!}
        {!! Form::hidden('comparefield', '', array('id' => 'comparefield')) !!}
        <div class="col-xs-4 selectall" id="selectroom">
            <label>Habitación</label>
            <div class="input-group">
                {!! Form::select('room_id', $rooms, null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-4 selectdate selectall">
            <label>Fecha de Inicio</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                {!! Form::input('date','firstDate', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-4 selectdate selectall">
            <label>Fecha de Fin</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                {!! Form::input('date','secondDate', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-4">
            <label> </label>
            {!! Form::submit("Generar", ['class'=>'btn btn-block btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div><!-- /.box-body -->
  </div>
<!-- Form Entre Fechas -->
  <div id="form-between-dates" class="box box-danger">
	<div class="box-header with-border">
	  <h3 class="box-title">Ingrese fechas para generar el reporte </h3>
	</div>
	<div class="box-body">
	  <div class="row">
		{!! Form::open(['url'=>'reports/generate']) !!}
		{!! Form::hidden('reporttype', '', array('id' => 'reporttype')) !!}
		{!! Form::hidden('reportTitle', 'Check-ins por Fecha') !!}
		{!! Form::hidden('comparefield', '', array('id' => 'comparefield')) !!}
		<div class="col-xs-4">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				{!! Form::input('date','firstDate', null, ['class'=>'form-control']) !!}
			</div>                        
		</div>
		<div class="col-xs-4">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				{!! Form::input('date','secondDate', null, ['class'=>'form-control']) !!}
			</div>                        
		</div>
		<div class="col-xs-4">
		  {!! Form::submit("Enviar", ['class'=>'btn btn-block btn-primary']) !!}                      
		</div>
		{!! Form::close() !!}
	  </div>
	</div><!-- /.box-body -->
  </div>              
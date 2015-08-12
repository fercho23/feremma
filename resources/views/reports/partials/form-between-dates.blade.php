<!-- Form Entre Fechas -->
  <div class="box box-danger">
	<div class="box-header with-border">
	  <h3 class="box-title">Ingrese fechas para generar el reporte </h3>
	</div>
	<div class="box-body">
	  <div class="row">
		{!! Form::open(['url'=>'reports/generate']) !!}
		@include('errors.list')
		{!! Form::hidden('reportName', 'checkInsBetweenDates') !!}
		{!! Form::hidden('reportTitle', 'Check-ins por Fecha') !!}
		{!! Form::hidden('field', 'check_in') !!}
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
@extends('reports')
	@section('content')
		<h1>Gestión de Reportes</h1>
		@include('flash::message')
		@include('errors.list')
		<div class="row" id="reports-row">
			<!-- Left col -->
			<div class="col-md-8">
			  	@include('reports.partials.box', ['class'=>'info-box bg-red' , 'form'=>'form-between-dates', 'compareField'=>'check_in','reportTitle'=>'Check-ins por Fecha','reporttype'=>'betweenDates','icon'=>'fa fa-arrow-left','reportDescription'=>'Muestra el listado de checkins entre fechas.'])
			  	@include('reports.partials.box', ['class'=>'info-box bg-aqua' , 'form'=>'form-between-dates', 'compareField'=>'check_out','reportTitle'=>'CHECK-OUTS POR FECHA','reporttype'=>'betweenDates','icon'=>'fa fa-arrow-right','reportDescription'=>'Muestra el listado de checkouts entre fechas.'])
			 	<div class="row">
					<div class="col-md-6">
						@include('reports.partials.box', ['class'=>'info-box bg-green' , 'form'=>'form-between-dates', 'compareField'=>'','reportTitle'=>'HABITACIONES RESERVADAS ENTRE FECHAS.','reporttype'=>'betweenDates','icon'=>'fa fa-bed','reportDescription'=>'Listado de habitaciones que se reservaron entre fechas.'])
			  			@include('reports.partials.box', ['class'=>'info-box bg-yellow' , 'form'=>'form-between-dates', 'compareField'=>'','reportTitle'=>'HABITACIONES FUERA DE SERVICIO.','reporttype'=>'','icon'=>'fa fa-bed','reportDescription'=>'Listado de habitaciones Fuera de Servicio.'])            
					</div><!-- /.col -->
					<div class="col-md-6">
						@include('reports.partials.box', ['class'=>'info-box bg-red' , 'form'=>'form-between-dates', 'compareField'=>'','reportTitle'=>'HISTÓRICO HABITACIÓN.','reporttype'=>'','icon'=>'fa fa-bed','reportDescription'=>'Recuento de reservas por habitacion.'])
			  			@include('reports.partials.box', ['class'=>'info-box bg-aqua' , 'form'=>'form-between-dates', 'compareField'=>'','reportTitle'=>'RESERVAS PENDIENTES.','reporttype'=>'','icon'=>'fa-file-text-o fa','reportDescription'=>'Reservas proximas a su ocupación.'])          
					</div><!-- /.col -->
			  	</div><!-- /.row -->
			  	
			</div><!-- /.col -->
			<div class="col-md-4">
				@include('reports.partials.box', ['class'=>'info-box bg-yellow' , 'form'=>'form-between-dates', 'compareField'=>'','reportTitle'=>'Servicios por fechas','reporttype'=>'betweenDates','icon'=>'glyphicon glyphicon-glass','reportDescription'=>'Servicios contratados entre fechas'])
				@include('reports.partials.box', ['class'=>'info-box bg-green' , 'form'=>'form-between-dates', 'compareField'=>'','reportTitle'=>'SALDO PENDIENTE POR RESERVAS.','reporttype'=>'','icon'=>'fa fa-usd','reportDescription'=>''])
				@include('reports.partials.box', ['class'=>'info-box bg-red' , 'form'=>'form-between-dates', 'compareField'=>'','reportTitle'=>'SALDO PENDIENTE POR RESERVAS POR FECHA.','reporttype'=>'','icon'=>'fa fa-usd','reportDescription'=>''])
		  	</div>
		  	
		</div>	
		<div class="row" id="forms-row">
		  		<div class="col-md-12">
		  			@include('reports.partials.form-between-dates')
		  		</div>
		</div>	
	@endsection
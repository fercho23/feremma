@extends('reports')
	@section('content')
		<h1>Gestión de Reportes</h1>
		@include('flash::message')
		<div class="row">
			<!-- Left col -->
			<div class="col-md-8">
			  @include('reports.partials.box', ['class'=>'info-box bg-red' ,'reportTitle'=>'Check-ins por Fecha','reportName'=>'checkInsBetweenDates','icon'=>'fa fa-arrow-left','reportDescription'=>'Muestra el listado de checkins entre fechas.'])
			  @include('reports.partials.box', ['class'=>'info-box bg-aqua' ,'reportTitle'=>'CHECK-OUTS POR FECHA','reportName'=>'checkInsBetweenDates','icon'=>'fa fa-arrow-right','reportDescription'=>'Muestra el listado de checkouts entre fechas.'])
			 <div class="row">
				<div class="col-md-6">
				@include('reports.partials.box', ['class'=>'info-box bg-green' ,'reportTitle'=>'HABITACIONES RESERVADAS ENTRE FECHAS.','reportName'=>'checkInsBetweenDates','icon'=>'fa fa-bed','reportDescription'=>'Listado de habitaciones que se reservaron entre fechas.'])
			  	@include('reports.partials.box', ['class'=>'info-box bg-yellow' ,'reportTitle'=>'HABITACIONES FUERA DE SERVICIO.','reportName'=>'','icon'=>'fa fa-bed','reportDescription'=>'Listado de habitaciones Fuera de Servicio.'])            
				</div><!-- /.col -->
				<div class="col-md-6">
					@include('reports.partials.box', ['class'=>'info-box bg-red' ,'reportTitle'=>'HISTÓRICO HABITACIÓN.','reportName'=>'','icon'=>'fa fa-bed','reportDescription'=>'Recuento de reservas por habitacion.'])
			  		@include('reports.partials.box', ['class'=>'info-box bg-aqua' ,'reportTitle'=>'RESERVAS PENDIENTES.','reportName'=>'','icon'=>'fa-file-text-o fa','reportDescription'=>'Reservas proximas a su ocupación.'])          
				</div><!-- /.col -->
			  </div><!-- /.row -->
			  @include('reports.partials.form-between-dates')
			</div><!-- /.col -->

			<div class="col-md-4">
				@include('reports.partials.box', ['class'=>'info-box bg-yellow' ,'reportTitle'=>'Servicios por fechas','reportName'=>'checkInsBetweenDates','icon'=>'glyphicon glyphicon-glass','reportDescription'=>'Servicios contratados entre fechas'])
				@include('reports.partials.box', ['class'=>'info-box bg-green' ,'reportTitle'=>'SALDO PENDIENTE POR RESERVAS.','reportName'=>'','icon'=>'fa fa-usd','reportDescription'=>''])
				@include('reports.partials.box', ['class'=>'info-box bg-red' ,'reportTitle'=>'SALDO PENDIENTE POR RESERVAS POR FECHA.','reportName'=>'','icon'=>'fa fa-usd','reportDescription'=>''])
		  	</div>		
	@endsection
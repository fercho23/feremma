@extends('reports')
	@section('content')
		<h1>Gestión de Reportes</h1>
		@include('flash::message')
		@include('errors.list')
		<div class="row" id="reports-row">
			<!-- Left col -->
			<div class="col-md-8">
			  	@include('reports.partials.box', ['class'=>'info-box bg-red' , 'form'=>'form-between-dates', 'comparefield'=>'check_in','reporttitle'=>'Check-ins por Fecha','reporttype'=>'checkInsBetweenDates','icon'=>'fa fa-arrow-left','reportDescription'=>'Muestra el listado de checkins entre fechas.'])
			  	@include('reports.partials.box', ['class'=>'info-box bg-aqua' , 'form'=>'form-between-dates', 'comparefield'=>'check_out','reporttitle'=>'CHECK-OUTS POR FECHA','reporttype'=>'checkOutsBetweenDates','icon'=>'fa fa-arrow-right','reportDescription'=>'Muestra el listado de checkouts entre fechas.'])
			 	<div class="row">
					<div class="col-md-6">
						@include('reports.partials.box', ['class'=>'info-box bg-green' , 'form'=>'form-between-dates', 'comparefield'=>'','reporttitle'=>'HABITACIONES RESERVADAS ENTRE FECHAS.','reporttype'=>'roomsReservationsBetweenDates','icon'=>'fa fa-bed','reportDescription'=>'Listado de habitaciones que se reservaron entre fechas.'])
			  			@include('reports.partials.box', ['class'=>'info-box bg-yellow' , 'form'=>'form-between-dates', 'comparefield'=>'available','reporttitle'=>'HABITACIONES FUERA DE SERVICIO.','reporttype'=>'disabledRooms','icon'=>'fa fa-bed','reportDescription'=>'Listado de habitaciones Fuera de Servicio.'])            
					</div><!-- /.col -->
					<div class="col-md-6">
						@include('reports.partials.box', ['class'=>'info-box bg-red' , 'form'=>'form-between-dates', 'comparefield'=>'','reporttitle'=>'HISTÓRICO HABITACIÓN.','reporttype'=>'historicRoom','icon'=>'fa fa-bed','reportDescription'=>'Todas las reservas de una habitación.'])
			  			@include('reports.partials.box', ['class'=>'info-box bg-aqua' , 'form'=>'form-simple', 'comparefield'=>'','reporttitle'=>'RESERVAS PENDIENTES.','reporttype'=>'nextReservations','icon'=>'fa-file-text-o fa','reportDescription'=>'Reservas proximas a su ocupación.'])          
					</div><!-- /.col -->
			  	</div><!-- /.row -->
			  	
			</div><!-- /.col -->
			<div class="col-md-4">
				@include('reports.partials.box', ['class'=>'info-box bg-yellow' , 'form'=>'form-between-dates', 'comparefield'=>'','reporttitle'=>'Servicios por fechas','reporttype'=>'servicesBetweenDates','icon'=>'glyphicon glyphicon-glass','reportDescription'=>'Servicios contratados entre fechas'])
				@include('reports.partials.box', ['class'=>'info-box bg-green' , 'form'=>'form-between-dates', 'comparefield'=>'','reporttitle'=>'SALDO PENDIENTE POR RESERVAS.','reporttype'=>'nextReservationsDue','icon'=>'fa fa-usd','reportDescription'=>'Ingresos por reservas proximas'])
				@include('reports.partials.box', ['class'=>'info-box bg-red' , 'form'=>'form-between-dates', 'comparefield'=>'','reporttitle'=>'SALDO PENDIENTE POR RESERVAS POR FECHA.','reporttype'=>'nextReservationsDueBetweenDates','icon'=>'fa fa-usd','reportDescription'=>'Ingresos por reservas entre fechas'])
		  	</div> 	
		</div>	
		<div class="row" id="forms-row">
		  		<div class="col-md-12">
		  			@include('reports.partials.form')
		  		</div>
		  		<div class="col-lg-12 again">
					<a href="{!! URL('reports') !!}" class="btn btn-block btn-danger btn-lg" href="">Volver a selección de Reportes</a>                    
				</div>
		</div>	
	@endsection
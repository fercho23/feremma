@extends('app')

    @section('content')
        <h1>Gestón de Reportes</h1>
        @include('flash::message')
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-arrow-left"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Check-ins por Fecha<span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    Muestra el listado de checkins para una fecha determinada.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-arrow-right"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Check-outs por Fecha.</span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    Muestra el listado de checkouts para una fecha determinada.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="row">
                <div class="col-md-6">
                <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-bed"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Habitaciones Reservadas entre Fechas.</span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    Listado de habitaciones que se reservaron en fechas determinadas.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-bed"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Habitaciones Fuera de Servicio.</span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    Listado de habitaciones Fuera de Servicio.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->                  
                </div><!-- /.col -->

                <div class="col-md-6">
                <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-bed"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Histórico Habitación.</span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    Recuento de reservas por habitacion.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa-file-text-o fa"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Reservas Pendientes.</span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    Reservas proximas a su ocupación.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->                  
                </div><!-- /.col -->
              </div><!-- /.row -->              
            </div><!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="glyphicon glyphicon-glass"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Servicios por Fecha.<span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    Servicios contratados entre fechas.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-usd"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Saldo Pendiente por Reservas.<span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-usd"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Saldo Pendiente por Reservas por Fecha.</span>
                  <span class="info-box-number"><a href="">GENERAR</a></span>
                  <hr style="margin:0; color:grey;">
                  <span class="progress-description">
                    
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->


              


            </div><!-- /.col -->
          </div>
        
    @endsection
<!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{!! FerEmma\Reservation::count() !!}</h3>
                        <p>Reservas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <a href="{{ URL('reservations/create') }}" class="small-box-footer">Nueva Reserva <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{!! Auth::user()->count() !!}</h3>
                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ URL('users/create') }}" class="small-box-footer">Nuevo Usuario <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{!! count(FerEmma\Reservation::where('check_in', '=', date("Y-m-d", strtotime("today")))->get()) !!}<sup style="font-size: 20px"></sup></h3>
                        <p>Check-ins para hoy</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                    <a href="{{ URL('reservations') }}" class="small-box-footer">Ver mas... <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{!! count(FerEmma\Reservation::where('check_out', '=', date("Y-m-d", strtotime("today")))->get()) !!}</h3>
                        <p>Check-outs para hoy</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                    <a href="{{ URL('reservations') }}" class="small-box-footer">Ver mas... <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
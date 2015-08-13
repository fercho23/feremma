@extends('app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Home
                        </div>
                        <div class="panel-body">
                        <div class="callout callout-success">
                            <h4>Gracias por utilizar AdminHOTEL!</h4>
                            <p>AdminHOTEL® Gestión Hotelera.</p>
                        </div>
                            <a href="{!! URL('auth/login') !!}" class="btn btn-block btn-info btn-lg">INICIAR SESIÓN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
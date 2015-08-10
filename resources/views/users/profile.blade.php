@extends('app')
    @section('content')
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('/css/profile.css') }}" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
        <div class="container">
            <div class="row login_box">
                <div class="col-md-12 col-xs-12" align="center">
                    <div class="line"><h3>Mi Perfil</h3></div>
                    <div class="outter"><img src="{!! asset('dist/img/avatar'.(Auth::user()->sex == 'm' ? '5' : '2').'.png') !!}" class="image-circle"/></div>   
                    <h1>{!! Auth::user()->fullname() !!}</h1>
                </div>
                <div class="col-md-6 col-xs-6 follow line" align="center">
                    <h3>
                         {!! Auth::user()->role->name !!} <br/> <span>CARGO</span>
                    </h3>
                </div>
                <div class="col-md-6 col-xs-6 follow line" align="center">
                    <h3>
                         {!! Auth::user()->created_at->format('d/m/Y') !!} <br/> <span>DESDE</span>
                    </h3>
                </div> 
                <div class="col-md-12 col-xs-12 login_control">                
                        <div class="control">
                            <div class="label">Email Address</div>
                            {!! Auth::user()->email !!}
                        </div> 

                        <div class="control">
                            <div class="label">DNI</div>
                            {!! Auth::user()->dni !!}
                        </div>
                        <div class="control">
                            <div class="label">CUIL</div>
                            {!! Auth::user()->cuil !!}
                        </div>
                        <div class="control">
                            <div class="label">Fecha de Nacimiento</div>
                            {!! Auth::user()->birthday !!}
                        </div> 
                        <div class="control">
                            <div class="label">Sexo</div>
                            {!! Auth::user()->sex !!}
                        </div> 
                </div>            
        </div>
    @endsection
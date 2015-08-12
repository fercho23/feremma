@extends('app')

    @section('content')
        <h1>Generación de Informe</h1>
        @include('flash::message')
        @if (sizeof($items)>0)        
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">{!!$request['reportTitle']!!}</h3>
                          <p>Con {!!$request['comparefield']!!} entre: {!!$request['firstDate']!!} y {!!$request['secondDate']!!}</p>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        @foreach($items[0]['attributes'] as $key => $value)                            
                                          <th>{!!$key!!}</th>                              
                                        @endforeach
                                    </tr>
                                    @foreach($items as $item)
                                        <tr>
                                            @foreach($item['attributes'] as $key => $value)
                                                <td>{!!$value!!}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach               
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="{!! URL('reports') !!}" class="btn btn-block btn-primary btn-lg" href="">Volver a selección de Informes</a>                    
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>No se registran elementos que cumplan con las condiciones definidas para el reporte.</p>
            </div>
        @endif
    @endsection
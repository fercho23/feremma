@extends('app')

    @section('content')
        <h1>Reporte</h1>
        @include('flash::message')
        @if (sizeof($items)>0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">{!!$request['reporttitle']!!}</h3>
                            @if($request['comparefield']!="" and $request['firstDate']!="" and $request['secondDate']!="")
                            <p>Con {!!$request['comparefield']!!} entre: {!!$request['firstDate']!!} y {!!$request['secondDate']!!}</p>
                            @else
                                @if($request['firstDate']!="" and $request['secondDate']!="")
                                <p>Entre: {!!$request['firstDate']!!} y {!!$request['secondDate']!!}</p>
                                @endif
                            @endif
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        @foreach($items[0]['attributes'] as $key => $value)
                                          <th>{!!$key!!}</th>
                                        @endforeach
                                    </tr>
                                    <?php $total=0 ?>
                                    @foreach($items as $item)
                                        <tr>
                                            @foreach($item['attributes'] as $key => $value)
                                                <td>{!!$value!!}</td>
                                            @endforeach
                                        </tr>
                                        <?php $total+=$item['attributes']['total_price'] ?>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input value="{!!$total!!}" type="text" class="form-control" readonly="true" placeholder="0000.00">
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>No se registran elementos que cumplan con las condiciones definidas para el reporte.</p>
            </div>
        @endif
            <div class="row">
                <div class="col-lg-12">
                    <a href="{!! URL('reports') !!}" class="btn btn-block btn-danger btn-lg" href="">Volver a selección de Reportes</a>
                </div>
            </div>
    @endsection
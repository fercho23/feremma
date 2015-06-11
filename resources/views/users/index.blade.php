@extends('app')

    @section('content')
        @if (sizeof($users)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cargo</th>
                                <th>Nombre de Usuario</th>
                                <th>DNI</th>
                                <th>CUIL</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th style="width: 36px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{!! $user->id !!}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->surname !!}</td>
                                <td>{!! $user->post->name !!}</td>
                                <td>{!! $user->username !!}</td>
                                <td>{!! $user->dni !!}</td>
                                <td>{!! $user->cuil !!}</td>
                                <td>{!! $user->address !!}</td>
                                <td>{!! $user->phone !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>
                                    <a href="{!! URL::to('users/'.$user->id.'/edit') !!}">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id]]) !!}
                                        <button class="btn-link" type="submit">
                                            <i class="glyphicon glyphicon-trash"></i>
                                         </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>Aún no hay elementos registrados en el sistema.</p>
            </div>
        @endif
    @endsection
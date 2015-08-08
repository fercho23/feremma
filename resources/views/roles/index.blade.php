@extends('app')

    @section('content')

        @include('flash::message')

        @if (sizeof($roles)>0)
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cantidad de usuarios</th>
                                <th>Cantidad de permisos</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('roles/edit'))
                                    <th></th>
                                @endif
                                @if(Auth::user()->can('roles/destroy'))
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{!! $role->id !!}</td>
                                <td>{!! $role->name !!}</td>
                                <td>{!! $role->users()->count() !!}</td>
                                <td>{!! $role->permissions()->count() !!}</td>
                                <td>{!! $role->description !!}</td>
                                @if(Auth::user()->can('roles/edit'))
                                    <td>
                                        <a href="{!! URL::to('roles/'.$role->id.'/edit') !!}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->can('roles/destroy'))
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['RolesController@destroy', $role->id]]) !!}
                                            <button class="btn-link" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                @endif
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
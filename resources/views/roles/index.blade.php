@extends('app')
    @section('content')
        @if (sizeof($roles)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('roles/edit') || Auth::user()->can('roles/destroy'))
                                    <th style="width: 36px;"></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{!! $role->id !!}</td>
                                <td>{!! $role->name !!}</td>
                                <td>{!! $role->description !!}</td>
                                @if(Auth::user()->can('roles/edit'))
                                    <td>
                                        <a href="{!! URL::to('roles/'.$role->id.'/edit') !!}">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->can('roles/destroy'))
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['RolesController@destroy', $role->id]]) !!}
                                            <button class="btn-link" type="submit">
                                                <i class="glyphicon glyphicon-trash"></i>
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
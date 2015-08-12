@extends('app')

    @section('content')

        @if(Auth::user()->canAnyActionsByModel('roles', ['edit', 'show']))
            @include('includes.partials.search', ['id'=> 'role',
                                                  'placeholder' => 'Ingresar Nombre de un Cargo . . .'])
        @endif

        <h1>Cargos</h1>
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
                                @if(Auth::user()->canAnyActionsByModel('roles', ['edit', 'show']))
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
                                @if(Auth::user()->canAnyActionsByModel('roles', ['edit', 'show']))
                                    <td>
                                        @if(Auth::user()->can('roles/edit'))
                                            <a href="{!! URL::route('roles-edit', $role->id) !!}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @else
                                            @if(Auth::user()->can('roles/show'))
                                                <a href="{!! URL::route('roles-show', $role->id) !!}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                @if(Auth::user()->can('roles/destroy'))
                                    <td>
                                        @if($role->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles-destroy', $role->id]]) !!}
                                                <button class="btn-link" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! str_replace('/?', '?', $roles->render()) !!}
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>Aún no hay elementos registrados en el sistema.</p>
            </div>
        @endif
    @endsection

    @if(Auth::user()->canAnyActionsByModel('roles', ['edit', 'show']))
        @section('extra_js')
            @include('roles.partials.search-js')
        @endsection
    @endif
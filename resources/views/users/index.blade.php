@extends('app')

    @section('content')

        @if(Auth::user()->canAnyActionsByModel('users', ['edit', 'show']))
            @include('includes.partials.search', ['id'=> 'person',
                                                  'placeholder' => 'Ingresar Nombre, Apellido o DNI de un Usuario . . .'])
        @endif

        <h1>
            Usuarios
            <small>( {!! $users->total() !!} en total)</small>
        </h1>
        @include('flash::message')

        @if (sizeof($users)>0)
            <div class="row">
                <div class="col-lg-12">
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
                                @if(Auth::user()->canAnyActionsByModel('users', ['edit', 'show']))
                                    <th></th>
                                @endif
                                @if(Auth::user()->can('users/destroy'))
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{!! $user->id !!}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->surname !!}</td>
                                <td>
                                    @if (sizeof($user->role)>0)
                                        {!! $user->role->name !!}
                                    @endif
                                </td>
                                <td>{!! $user->username !!}</td>
                                <td>{!! $user->dni !!}</td>
                                <td>{!! $user->cuil !!}</td>
                                <td>{!! $user->address !!}</td>
                                <td>{!! $user->phone !!}</td>
                                <td>{!! $user->email !!}</td>
                                @if(Auth::user()->canAnyActionsByModel('users', ['edit', 'show']))
                                    <td>
                                        @if(Auth::user()->can('users/edit'))
                                            <a href="{!! URL::route('users-edit', $user->id) !!}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @else
                                            @if(Auth::user()->can('users/show'))
                                                <a href="{!! URL::route('users-show', $user->id) !!}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                @if(Auth::user()->can('users/destroy'))
                                    <td>
                                        @if($user->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users-destroy', $user->id]]) !!}
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
                    {!! str_replace('/?', '?', $users->render()) !!}
                </div>
            </div>

        @else
            <div class="alert alert-danger">
                <p>Aún no hay elementos registrados en el sistema.</p>
            </div>
        @endif
    @endsection

    @if(Auth::user()->canAnyActionsByModel('users', ['edit', 'show']))
        @section('extra_js')
            @include('users.partials.search-js')
        @endsection
    @endif
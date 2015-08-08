@extends('app')
    @section('content')

        @include('flash::message')

        @if (sizeof($roles)>0)
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Permisos</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{!! $role->id !!}</td>
                                <td>{!! $role->name !!}</td>
                                <td>{!! $role->description !!}</td>
                                <td>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Titulo</th>
                                                <th>Descripción</th>
                                                <th>Slug</th>
                                            </tr>
                                        </thead>
                                        @foreach($role->permissions as $permission)
                                        <tbody>
                                            <tr>
                                                <td>{!! $permission->id !!}</td>
                                                <td>{!! $permission->title !!}</td>
                                                <td>{!! $permission->description !!}</td>
                                                <td>{!! $permission->slug !!}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>

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
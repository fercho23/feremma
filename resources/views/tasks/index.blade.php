@extends('app')
    @section('content')

        @include('flash::message')

        @if (sizeof($tasks)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                                @if(Auth::user()->can('tasks/edit') || Auth::user()->can('tasks/destroy'))
                                    <th style="width: 36px;"></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{!! $task->id !!}</td>
                                <td>{!! $task->name !!}</td>
                                <td>
                                    @if (sizeof($task->role)>0)
                                        {!! $task->role->name !!}
                                    @endif
                                </td>
                                <td>{!! $task->priority !!}</td>
                                <td>{!! $task->state !!}</td>
                                <td>{!! $task->description !!}</td>
                                @if(Auth::user()->can('tasks/edit'))
                                    <td>
                                        <a href="{!! URL::to('tasks/'.$task->id.'/edit') !!}">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->can('tasks/destroy'))
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['TasksController@destroy', $task->id]]) !!}
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
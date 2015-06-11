@extends('app')
    @section('content')
        @if (sizeof($tasks)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                                <th style="width: 36px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{!! $task->id !!}</td>
                                <td>{!! $task->name !!}</td>
                                <td>{!! $task->priority !!}</td>
                                <td>{!! $task->state !!}</td>
                                <td>{!! $task->description !!}</td>
                                <td>
                                    <a href="{!! URL::to('tasks/'.$task->id.'/edit') !!}">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['TasksController@destroy', $task->id]]) !!}
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
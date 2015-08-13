@extends('app')

    @section('content')

        @if(Auth::user()->canAnyActionsByModel('tasks', ['edit', 'show']))
            @include('includes.partials.search', ['id'=> 'task',
                                                  'placeholder' => 'Ingresar Nombre de una Tarea . . .'])
        @endif

        <h1>
            Tareas
            <small>( {!! $tasks->total() !!} en total)</small>
        </h1>
        @include('flash::message')

        @if (sizeof($tasks)>0)
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                                @if(Auth::user()->canAnyActionsByModel('tasks', ['edit', 'show']))
                                    <th></th>
                                @endif
                                @if(Auth::user()->can('tasks/destroy'))
                                    <th></th>
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
                                @if(Auth::user()->canAnyActionsByModel('tasks', ['edit', 'show']))
                                    <td>
                                        @if(Auth::user()->can('tasks/edit'))
                                            <a href="{!! URL::route('tasks-edit', $task->id) !!}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @else
                                            @if(Auth::user()->can('tasks/show'))
                                                <a href="{!! URL::route('tasks-show', $task->id) !!}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                @if(Auth::user()->can('tasks/destroy'))
                                    <td>
                                        @if($task->canBeEliminated())
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['tasks-destroy', $task->id]]) !!}
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
                    {!! str_replace('/?', '?', $tasks->render()) !!}
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <p>Aún no hay elementos registrados en el sistema.</p>
            </div>
        @endif
    @endsection

    @if(Auth::user()->canAnyActionsByModel('tasks', ['edit', 'show']))
        @section('extra_js')
            @include('tasks.partials.search-js')
        @endsection
    @endif
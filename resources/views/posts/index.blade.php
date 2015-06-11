@extends('app')
    @section('content')
        @if (sizeof($posts)>0)
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th style="width: 36px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{!! $post->id !!}</td>
                                <td>{!! $post->name !!}</td>
                                <td>{!! $post->description !!}</td>
                                <td>
                                    <a href="{!! URL::to('posts/'.$post->id.'/edit') !!}"><i class="glyphicon glyphicon-pencil"></i></a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['PostsController@destroy', $post->id]]) !!}
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
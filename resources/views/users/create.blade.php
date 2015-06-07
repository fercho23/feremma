@extends('app') 
@section('content') 
	<h1>Nuevo Usuario</h1>
	<hr/>
	{!! Form::open(['url'=>'users'])!!}
		@include('errors.list')
		@include('users.form', ['submitButtontext'=>'Guardar'])
	{!! Form::close()!!}	
@stop
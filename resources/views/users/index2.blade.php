@extends('app')
 
@section('content')
 
<div class="container-fluid">
	@if (sizeof($users)>0)
 
	@foreach ($users as $user)
	<div class="row">
		<div class="col-sm-6 col-md-12">
			<div class="thumbnail">
				<div class="caption">
					<h3>{{$user->surname}}, {{$user->name}}</h3> 
					<p>{{$user->address}}</p>				
				</div>
			</div>
		</div>
	</div>
 
	@endforeach
	@else
	<div class="alert alert-danger">
		<p>Aún no hay elementos registrados en el sistema.</p>
	</div>
	@endif
</div>
@endsection
<div class="form-group">
	{!!Form::label('name','Nombre: ')!!}
	{!!Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::label('description','Descripción: ')!!}
	{!!Form::text('description', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control'])!!}
</div>
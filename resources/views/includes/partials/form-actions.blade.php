<div class="form-group">
    {!! Form::submit($submitButtontext, ['class'=>'btn btn-primary form-control']) !!}
    </br>
    </br>
    <a href="{!! URL::route($model.'-index') !!}" class="btn btn-warning form-control" value="Cancelar">Cancelar</a>
</div>
@if(Auth::user()->canConsidering($conditions))
	@include($include, $parameters)
@endif
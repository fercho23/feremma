@if ($errors->any())
    <dl class="">
        @foreach ($errors->all() as $error)
            <dt class="alert alert-danger" role="alert">{{ $error }}</dt>
        @endforeach
    </dl>
    <br>
@endif
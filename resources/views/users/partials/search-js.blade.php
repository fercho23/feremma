<script type="text/javascript">
    $('#person').autocomplete({
        source: '{!! URL::route("search-user") !!}',
        minLength: 2,
        select: function(event, ui){
            @if(Auth::user()->can('users/edit'))
                var url = '{!! route("users-edit") !!}';
            @else
                var url = '{!! route("users-show") !!}';
            @endif
            window.location.href = url.replace('%7Busers%7D', ui.item.id);
        }
    });
</script>
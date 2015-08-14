<script type="text/javascript">
    $('#person').autocomplete({
        @if(isset($is_client))
            source: '{!! URL::route("search-client") !!}',
        @else
            source: '{!! URL::route("search-user") !!}',
        @endif
        minLength: 2,
        select: function(event, ui){
            @if(isset($is_client))
                @if(Auth::user()->can('clients/edit'))
                    var url = '{!! route("clients-edit") !!}';
                @else
                    var url = '{!! route("clients-show") !!}';
                @endif
                window.location.href = url.replace('%7Bclients%7D', ui.item.id);
            @else
                @if(Auth::user()->can('users/edit'))
                    var url = '{!! route("users-edit") !!}';
                @else
                    var url = '{!! route("users-show") !!}';
                @endif
                window.location.href = url.replace('%7Busers%7D', ui.item.id);
            @endif

        }
    });
</script>
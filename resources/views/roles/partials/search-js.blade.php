<script type="text/javascript">
    $('#role').autocomplete({
        source: '{!! URL::route("search-role") !!}',
        minLength: 2,
        select: function(event, ui){
            @if(Auth::user()->can('roles/edit'))
                var url = '{!! route("roles-edit") !!}';
            @else
                var url = '{!! route("roles-show") !!}';
            @endif
            window.location.href = url.replace('%7Broles%7D', ui.item.id);
        }
    });
</script>
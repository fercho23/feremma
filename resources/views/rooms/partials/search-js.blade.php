<script type="text/javascript">
    $('#room').autocomplete({
        source: '{!! URL::route("search-room") !!}',
        minLength: 2,
        select: function(event, ui){
            @if(Auth::user()->can('rooms/edit'))
                var url = '{!! route("rooms-edit") !!}';
            @else
                var url = '{!! route("rooms-show") !!}';
            @endif
            window.location.href = url.replace('%7Brooms%7D', ui.item.id);
        }
    });
</script>
<script type="text/javascript">
    $('#bed').autocomplete({
        source: '{!! URL::route("search-bed") !!}',
        minLength: 2,
        select: function(event, ui){
            @if(Auth::user()->can('beds/edit'))
                var url = '{!! route("beds-edit") !!}';
            @else
                var url = '{!! route("beds-show") !!}';
            @endif
            window.location.href = url.replace('%7Bbeds%7D', ui.item.id);
        }
    });
</script>
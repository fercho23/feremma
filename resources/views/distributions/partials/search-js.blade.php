<script type="text/javascript">
    $('#distribution').autocomplete({
        source: '{!! URL::route("search-distribution") !!}',
        minLength: 2,
        select: function(event, ui){
            @if(Auth::user()->can('distributions/edit'))
                var url = '{!! route("distributions-edit") !!}';
            @else
                var url = '{!! route("distributions-show") !!}';
            @endif
            window.location.href = url.replace('%7Bdistributions%7D', ui.item.id);
        }
    });
</script>
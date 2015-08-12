<script type="text/javascript">
    $('#service').autocomplete({
        source: '{!! URL::route("search-service") !!}',
        minLength: 2,
        select: function(event, ui){
            @if(Auth::user()->can('services/edit'))
                var url = '{!! route("services-edit") !!}';
            @else
                var url = '{!! route("services-show") !!}';
            @endif
            window.location.href = url.replace('%7Bservices%7D', ui.item.id);
        }
    });
</script>
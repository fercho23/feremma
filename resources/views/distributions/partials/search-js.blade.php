<script type="text/javascript">
    $('#distribution').autocomplete({
        source: '{!! URL::route("search-distribution") !!}',
        minLength: 2,
        select: function(event, ui){
            var url = '{!! route("distributions-edit") !!}';
            window.location.href = url.replace('%7Bdistributions%7D', ui.item.id);
        }
    });
</script>
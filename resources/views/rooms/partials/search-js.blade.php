<script type="text/javascript">
    $('#room').autocomplete({
        source: '{!! URL::route("search-room") !!}',
        minLength: 2,
        select: function(event, ui){
            var url = '{!! route("rooms-edit") !!}';
            window.location.href = url.replace('%7Brooms%7D', ui.item.id);
        }
    });
</script>
<script type="text/javascript">
    $('#person').autocomplete({
        source: '{!! URL::route("search-user") !!}',
        minLength: 2,
        select: function(event, ui){
            var url = '{!! route("users-edit") !!}';
            window.location.href = url.replace('%7Busers%7D', ui.item.id);
        }
    });
</script>
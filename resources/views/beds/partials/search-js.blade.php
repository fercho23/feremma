<script type="text/javascript">
    $('#bed').autocomplete({
        source: '{!! URL::route("search-bed") !!}',
        minLength: 2,
        select: function(event, ui){
            var url = '{!! route("beds-edit") !!}';
            window.location.href = url.replace('%7Bbeds%7D', ui.item.id);
        }
    });
</script>
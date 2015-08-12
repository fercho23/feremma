<script type="text/javascript">
    $('#service').autocomplete({
        source: '{!! URL::route("search-service") !!}',
        minLength: 2,
        select: function(event, ui){
            var url = '{!! route("services-edit") !!}';
            window.location.href = url.replace('%7Bservices%7D', ui.item.id);
        }
    });
</script>
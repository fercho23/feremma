<script type="text/javascript">
    $('#role').autocomplete({
        source: '{!! URL::route("search-role") !!}',
        minLength: 2,
        select: function(event, ui){
            var url = '{!! route("roles-edit") !!}';
            window.location.href = url.replace('%7Broles%7D', ui.item.id);
        }
    });
</script>
<script type="text/javascript">
    console.log("hola a");
    $('#owner_id').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{!! URL::route("search-user") !!}',
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui){
            $('#owner_id').val(ui.item.value);
        }
    });
</script>
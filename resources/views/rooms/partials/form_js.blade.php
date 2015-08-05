<script type="text/javascript">

    function countElement($name){
        $e = [];
        $('div#label-' + $name + ' div[id^=' + $name + '-]').each(function() {
            $n = $(this).attr('id').match(/[0-9]+/g);
            $e.push(parseInt($n));
        });
        $('input#' + $name + '_id').attr('value', $e.sort(function(a, b){return a-b}));
    }

    $('#distribution').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{!! URL::route("search-remaining-distributions") !!}',
                dataType: 'json',
                data: {
                    term: request.term,
                    ids: $('#pdistributions_id').val()
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui){
            if((!$('div#distributions-'+ui.item.id).length>0)&&($('#owner_id').val()!=ui.item.id)) {
                $('#label-distributions').append("<div id='distributions-" + ui.item.id + "' class='label label-info'"+
                                           " style='margin:5px;'>" + ui.item.value +
                                           " <i name='fa-kill' class='fa fa-times-circle'></i></div>");
                countElement('distributions');
            }
            $(this).val('');
            return false;
        }
    });

</script>
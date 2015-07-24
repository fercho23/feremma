<script type="text/javascript">

    function countElement($name){
        $e = [];
        $('div#label-' + $name + ' span.label').each(function() {
            $n = $(this).attr('id').match(/[0-9]+/g);
            $e.push(parseInt($n));
        });
        $('#' + $name + '_id').attr('value', $e.sort(function(a, b){return a-b}));
    }

    $(document).on('click', 'i[name="fa-kill"]', function() {
        $(this).parent().remove();
        countElement('rooms');
    });

    $('#room').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ URL::route("search-remaining-rooms") }}',
                    dataType: 'json',
                    data: {
                        term: request.term,
                        rooms_id: $('#rooms_id').attr('value')
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
        minLength: 2,
        select: function(event, ui){
            if(!$('span#room-'+ui.item.id).length>0) {
                $('#label-rooms').append('<span id=room-"' + ui.item.id + '" class="label label-info"'+
                                         ' style="margin:5px;" >' + ui.item.value +
                                         ' <i name="fa-kill" class="fa fa-times-circle"></i></span>');
                countElement('rooms');
            }
            $('#rooms').val('');
        }
    });

    $('#service').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ URL::route("search-remaining-services") }}',
                    dataType: 'json',
                    data: {
                        term: request.term,
                        services_id: $('#services_id').attr('value')
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
        minLength: 2,
        select: function(event, ui){
            if(!$('span#service-'+ui.item.id).length>0) {
                $('#label-services').append('<span id=service-"' + ui.item.id + '" class="label label-info"'+
                                            ' style="margin:5px;" >' + ui.item.value +
                                            ' <i name="fa-kill" class="fa fa-times-circle"></i></span>');
                countElement('services');
            }

        }
    });

    $('#person').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ URL::route("search-remaining-users") }}',
                    dataType: 'json',
                    data: {
                        term: request.term,
                        services_id: $('#persons_id').attr('value')
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
        minLength: 2,
        select: function(event, ui){
            if(!$('span#person-'+ui.item.id).length>0) {
                $('#label-persons').append('<span id=person-"' + ui.item.id + '" class="label label-info"'+
                                           ' style="margin:5px;" >' + ui.item.value +
                                           ' <i name="fa-kill" class="fa fa-times-circle"></i></span>');
                countElement('persons');
            }
            $('#persons').val('');
        }
    });

    $('#owner').autocomplete({
        source: '{!! URL::route("search-user") !!}',
        minLength: 2,
        select: function(event, ui){
            $('#owner').val(ui.item.value);
            $('#owner_id').val(ui.item.id);
        }
    });

</script>
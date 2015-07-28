<script type="text/javascript">

    function getServicesPrice(){
        $total = 0;
        $('div#label-services div[id^=services-]').each(function(k, v) {
            $n = parseInt($(v).attr('id').match(/[0-9]+/g));
            $quantity = parseInt($('input[name=service-quantity-'+$n+']').val());
            $price = parseFloat($('input[name=service-price-'+$n+']').val());
            $total += ($quantity * $price);
        });
        return $total
    }

    function suggestedPrice(){
        $suggested_price = getServicesPrice();
        $.ajax({
            url: '{!! URL::route("search-room-price-by-ids") !!}',
            type: 'GET',
            dataType: 'json',
            data: {
                ids: $('input#rooms_id').attr('value')
            },
        }).done(
            function(data) {
                $.each(data, function(index, value) {
                    $suggested_price += parseFloat(value.value);
                });
                $suggested_price = $suggested_price.toFixed(2).replace('.', ',');
                $('input[name=suggested_price]').attr('value', $suggested_price);
            }
        );
    }

    function countElement($name){
        $e = [];
        $('div#label-' + $name + ' div[id^=' + $name + '-]').each(function() {
            $n = $(this).attr('id').match(/[0-9]+/g);
            $e.push(parseInt($n));
        });
        $('input#' + $name + '_id').attr('value', $e.sort(function(a, b){return a-b}));
        suggestedPrice();
    }

    $(document).on('change', 'input[name^=service-quantity-]', function() {
        suggestedPrice();
    });
    $(document).on('change', 'input[name^=service-price-]', function() {
        suggestedPrice();
    });

    suggestedPrice();

    $(document).on('click', 'i[name="fa-kill"]', function() {
        $e = $(this).parents('div.group-labels').attr('id').split('label-');
        $(this).parents('div[id^='+$e[1]+'-]').remove();
        countElement($e[1]);
    });


    $('#room').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{!! URL::route("search-remaining-rooms") !!}',
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
            if(!$('div#rooms-'+ui.item.id).length>0) {
                $('#label-rooms').append("<div id='rooms-" + ui.item.id + "' class='label label-info'" +
                                         " style='margin:5px;'>" + ui.item.value +
                                         " <i name='fa-kill' class='fa fa-times-circle'></i></div>");
                countElement('rooms');
            }
            $(this).val('');
            return false;
        }
    });

    $('#service').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{!! URL::route("search-remaining-services") !!}',
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
            if(!$('div#services-'+ui.item.id).length>0) {
                $('#label-services').append("<div class='row' id='services-"+ui.item.id+"'>"+
                                                "<div class='col-lg-5 col-xs-5'>"+
                                                    "<input class='form-control' readonly='True' name='service-name-"+ui.item.id+"' type='text' value='"+ui.item.value+"'>"+
                                                "</div>"+
                                                "<div class='col-lg-3 col-xs-3'>"+
                                                    "<input class='form-control' min='1' name='service-quantity-"+ui.item.id+"' type='number' value='1'>"+
                                                "</div>"+
                                                "<div class='col-lg-3 col-xs-3'>"+
                                                    "<input class='form-control' max=9999999999' min='0' step='0.01' name='service-price-"+ui.item.id+"' type='number' value='"+ui.item.price+"'>"+
                                                "</div>"+
                                                "<div class='col-lg-1 col-xs-1'>"+
                                                    "<a class='btn btn-warning' href='#'>"+
                                                        "<i name='fa-kill' class='fa fa-times-circle'></i>"+
                                                    "</a>"+
                                                "</div>"+
                                             "</div>");
                countElement('services');
            }
            $(this).val('');
            return false;
        }
    });

    $('#person').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{!! URL::route("search-remaining-users") !!}',
                dataType: 'json',
                data: {
                    term: request.term,
                    persons_id: $('#persons_id').attr('value')+','+$('#owner_id').attr('value')
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui){
            if(!$('div#persons-'+ui.item.id).length>0) {
                $('#label-persons').append("<div id='persons-" + ui.item.id + "' class='label label-info'"+
                                           " style='margin:5px;'>" + ui.item.value +
                                           " <i name='fa-kill' class='fa fa-times-circle'></i></div>");
                countElement('persons');
            }
            $(this).val('');
            return false;
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
<script type="text/javascript">

    function getDays() {
        $check_in = ($('#check_in').val()).split('-');
        $check_out = ($('#check_out').val()).split('-');

        var firstDate = new Date($check_in[0], $check_in[1], $check_in[2]);
        var secondDate = new Date($check_out[0], $check_out[1], $check_out[2]);

        var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(24*60*60*1000)));

        if(diffDays) {
            return diffDays;
        }
        return 0;
    }

    function refreshPosibleRooms() {
        $('div#posible-rooms').empty();
        $.ajax({
            url: '{!! route("search-free-rooms") !!}',
            type: 'GET',
            dataType: 'json',
            data: {
                check_in: $('#check_in').val(),
                check_out: $('#check_out').val()
            },
        }).done(function(data) {
            $('div#posible-rooms').append('Posibles habitaciones ('+data.length+' en total):');
            $('div#posible-rooms').append('<div class="row">');
            $.each(data, function(index, value) {
                $('div#posible-rooms').append('<div class="col-lg-4 col-xs-4">'+value.value+'</div>');
            });
            $('div#posible-rooms').append('</div>');
        });

    }

    function getServicesPrice() {
        $total = 0;
        $('div#label-services div[id^=services-]').each(function(k, v) {
            $n = parseInt($(v).attr('id').match(/[0-9]+/g));
            $quantity = parseInt($('input[name=service-quantity-'+$n+']').val());
            $price = parseFloat($('input[name=service-price-'+$n+']').val());
            $total += ($quantity * $price);
        });
        return $total;
    }

    function getRoomsPrice() {
        $days = getDays();
        $total = 0;
        $('div#label-rooms div.row select[name^=room-]').each(function(k, v) {
            $n = parseInt($(v).attr('name').match(/[0-9]+/g));
            $total += $days * (parseFloat($('input[name^=room-final_price-'+$n+']').val()));
        });
        return $total;
    }

    function suggestedPrice() {
        $suggested_price = getServicesPrice();
        $suggested_price += getRoomsPrice();

        $percentage_sign = parseFloat($('input[name=percentage_sign]').val().replace(',', '.'));
        $suggested_sign = (($percentage_sign * $suggested_price) / 100).toFixed(2).replace('.', ',');
        $suggested_price = ($suggested_price).toFixed(2).replace('.', ',');

        $('input[name=suggested_price]').attr('value', $suggested_price);
        $('input[name=suggested_sign]').attr('value', $suggested_sign);
    }

    function refreshSelectDataByRoomId($id) {
        select = 'select[name=room-'+$id+'-distributions]';
        option = parseInt($(select).val());
        option = $(select+' option[value='+option+']');

        price = parseFloat($('input[name=room-price-'+$id+']').val());
        price = price + parseFloat(option.data('price'));

        $('input[name=room-total_persons-'+$id+']').attr('value', parseInt(option.data('persons')))
        $('input[name=room-final_price-'+$id+']').attr('value', price);
        suggestedPrice();
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

    $(document).on('change', 'input[name=percentage_sign]', function() {
        suggestedPrice();
    });
    $(document).on('change', 'input[name^=service-quantity-]', function() {
        suggestedPrice();
    });
    $(document).on('change', 'input[name^=service-price-]', function() {
        suggestedPrice();
    });

    $(document).on('change', 'input[name=check_in]', function() {
        refreshPosibleRooms();
        $('div#label-rooms').empty();
        countElement('rooms');
    });
    $(document).on('change', 'input[name=check_out]', function() {
        refreshPosibleRooms();
        $('div#label-rooms').empty();
        countElement('rooms');
    });

    $(document).on('change', 'div#label-rooms select[name^=room-]', function() {
        $id = parseInt($(this).attr('name').match(/[0-9]+/g));
        refreshSelectDataByRoomId($id);
    });

    refreshPosibleRooms();
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
                    ids: $('#rooms_id').val(),
                    check_in: $('#check_in').val(),
                    check_out: $('#check_out').val()
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui){
            if(!$('div#rooms-'+ui.item.id).length>0) {
                $.ajax({
                    url: '{!! route("get-distribution-by-room-id") !!}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: ui.item.id
                    },
                }).done(function(data) {
                    $select = "<select class='form-control' name='room-" + ui.item.id + "-distributions'>";
                    $.each(data, function(index, value) {
                        $select += "<option data-persons='"+value.totalPersons+"' data-price='"+value.price+"' value='" + value.id + "'>"+value.name+"</option>";
                    });
                    $select +="</select>";
                    final_price = parseFloat(data[0].price) + parseFloat(ui.item.price);
                    $('#label-rooms').append("<div class='row' id='rooms-" + ui.item.id + "'>"+
                                                 "<div class='col-lg-4 col-xs-4 no-gutter-right'>"+
                                                    "<input class='form-control' readonly='True' name='room-name-" + ui.item.id + "' type='text' value='" + ui.item.value + "'>"+
                                                    "<input name='room-price-" + ui.item.id + "' type='hidden' value='" + ui.item.price + "'>"+
                                                "</div>"+
                                                "<div class='col-lg-4 col-xs-4 no-gutter'>"+$select+"</div>"+
                                                "<div class='col-lg-1 col-xs-1 no-gutter'>"+
                                                    "<input class='form-control' readonly='True' name='room-total_persons-" + ui.item.id + "' type='text' value='" + data[0].totalPersons + "'>"+
                                                "</div>"+
                                                "<div class='col-lg-2 col-xs-2 no-gutter'>"+
                                                    "<div class='input-group'>"+
                                                        "<span class='input-group-addon'><i class='fa fa-arrow-right'></i></span>"+
                                                        "<input class='form-control' readonly='True' name='room-final_price-" + ui.item.id + "' type='text' value='" + final_price + "'>"+
                                                    "</div>"+
                                                "</div>"+
                                                "<div class='col-lg-1 col-xs-1'>"+
                                                    "<span class='btn btn-warning'><i name='fa-kill' class='fa fa-times-circle'></i></span>"+
                                                "</div>"+
                                            "</div>");
                    countElement('rooms');
                });
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
                    ids: $('#services_id').val()
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
                                                "<div class='col-lg-3 col-xs-3 no-gutter'>"+
                                                    "<input class='form-control' min='1' name='service-quantity-"+ui.item.id+"' type='number' value='1'>"+
                                                "</div>"+
                                                "<div class='col-lg-3 col-xs-3 no-gutter'>"+
                                                    "<input class='form-control' max=9999999999' min='0' step='0.01' name='service-price-"+ui.item.id+"' type='number' value='"+ui.item.price+"'>"+
                                                "</div>"+
                                                "<div class='col-lg-1 col-xs-1'>"+
                                                    "<span class='btn btn-warning'>"+
                                                        "<i name='fa-kill' class='fa fa-times-circle'></i>"+
                                                    "</span>"+
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
                    ids: $('#persons_id').val()+','+$('#owner_id').val()
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui){
            if((!$('div#persons-'+ui.item.id).length>0)&&($('#owner_id').val()!=ui.item.id)) {
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
            if($('div#persons-'+ui.item.id).length>0) {
                $('div#persons-'+ui.item.id).remove();
                countElement('persons');
            }
        }
    });

</script>

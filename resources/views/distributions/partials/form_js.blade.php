<script type="text/javascript">

    function priceAndTotalPersons() {
        $total_price = 0;
        $total_persons = 0;
        $('div#label-beds div[id^=beds-]').each(function(k, v) {
            $n = parseInt($(v).attr('id').match(/[0-9]+/g));

            $amount = parseInt($('input[name=bed-amount-'+$n+']').val());
            $price = parseFloat($('input[name=bed-price-'+$n+']').val());
            $persons = parseInt($('input[name=bed-total_persons-'+$n+']').val());

            $total_price += ($amount * $price);
            $total_persons += ($amount * $persons);
        });

        $total_price = ($total_price).toFixed(2).replace('.', ',');

        $('input[name=price]').attr('value', $total_price);
        $('input[name=total_persons]').attr('value', $total_persons);
    }

    priceAndTotalPersons();

    @if($distribution->canBeModified())

        function countElement($name) {
            $e = [];
            $('div#label-' + $name + ' div[id^=' + $name + '-]').each(function() {
                $n = $(this).attr('id').match(/[0-9]+/g);
                $e.push(parseInt($n));
            });
            $('input#' + $name + '_id').attr('value', $e.sort(function(a, b){return a-b}));
            priceAndTotalPersons();
        }


        $(document).on('click', 'i[name="fa-kill"]', function() {
            $e = $(this).parents('div.group-labels').attr('id').split('label-');
            $(this).parents('div[id^='+$e[1]+'-]').remove();
            countElement($e[1]);
        });

        $(document).on('change', 'input[name^=bed-amount-]', function() {
            priceAndTotalPersons();
        });


        $('#bed').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{!! URL::route("search-remaining-beds") !!}',
                    dataType: 'json',
                    data: {
                        term: request.term,
                        ids: $('#beds_id').val()
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui){
                if(!$('div#beds-'+ui.item.id).length>0) {
                    $('#label-beds').append("<div class='row' id='beds-"+ui.item.id+"'>"+
                                                    "<div class='col-lg-6 col-xs-6 no-gutter-right'>"+
                                                        "<input class='form-control' readonly='True' name='bed-name-"+ui.item.id+"' type='text' value='"+ui.item.value+"'>"+
                                                    "</div>"+
                                                    "<div class='col-lg-1 col-xs-1 no-gutter'>"+
                                                        "<input class='form-control' readonly='True' name='bed-total_persons-"+ui.item.id+"' type='text' value='"+ui.item.total_persons+"'>"+
                                                    "</div>"+
                                                    "<div class='col-lg-1 col-xs-1 no-gutter'>"+
                                                        "<input class='form-control' readonly='True' name='bed-price-"+ui.item.id+"' type='text' value='"+ui.item.price+"'>"+
                                                    "</div>"+
                                                    "<div class='col-lg-3 col-xs-3 no-gutter'>"+
                                                        "<input class='form-control' min='1' name='bed-amount-"+ui.item.id+"' type='number' value='1'>"+
                                                    "</div>"+
                                                    "<div class='col-lg-1 col-xs-1'>"+
                                                        "<span class='btn btn-warning'>"+
                                                            "<i name='fa-kill' class='fa fa-times-circle'></i>"+
                                                        "</span>"+
                                                    "</div>"+
                                                 "</div>");
                    countElement('beds');
                }
                $(this).val('');
                return false;
            }
        });

    @endif

</script>
<script type="text/javascript">

    function countElement($name){
        $e = [];
        $('div#label-' + $name + ' div[id^=' + $name + '-]').each(function() {
            $n = $(this).attr('id').match(/[0-9]+/g);
            $e.push(parseInt($n));
        });
        $('input#' + $name + '_id').attr('value', $e);
    }

    $(document).on('click', 'i[name="fa-kill"]', function() {
        $e = $(this).parents('div.group-labels').attr('id').split('label-');
        $(this).parents('div[id^='+$e[1]+'-]').remove();
        countElement($e[1]);
    });

    $('div#label-distributions').sortable({
        stop: function(event, ui){
            countElement('distributions');
        },
    });

    $('#distribution').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{!! URL::route("search-remaining-distributions") !!}',
                dataType: 'json',
                data: {
                    term: request.term,
                    ids: $('#distributions_id').val()
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            if((!$('div#distributions-'+ui.item.id).length>0)&&($('#owner_id').val()!=ui.item.id)) {
                $('#label-distributions').append("<div class='row' id='distributions-" + ui.item.id + "'>"+
                                                    "<div class='col-lg-10 col-xs-10 no-gutter-right'>"+
                                                        "<div class='form-control' readonly='True'>"+
                                                            ui.item.value+
                                                        "</div>"+
                                                    "</div>"+
                                                    "<div class='col-lg-1 col-xs-1 no-gutter'>"+
                                                        "<div class='form-control'>"+
                                                            "<input class='checkbox' checked='checked' name='distribution-checkbox-" + ui.item.id + "' type='checkbox'>"+
                                                        "</div>"+
                                                    "</div>"+
                                                    "<div class='col-lg-1 col-xs-1'>"+
                                                        "<span class='btn btn-warning'>"+
                                                            "<i name='fa-kill' class='fa fa-times-circle'></i>"+
                                                        "</span>"+
                                                    "</div>"+
                                                "</div>");
                countElement('distributions');
            }
            $(this).val('');
            return false;
        }
    });

</script>
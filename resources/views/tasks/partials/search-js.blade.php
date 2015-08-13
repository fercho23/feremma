<script type="text/javascript">
    $('#task').autocomplete({
        source: '{!! URL::route("search-task") !!}',
        minLength: 2,
        select: function(event, ui){
            @if(Auth::user()->can('tasks/edit'))
                var url = '{!! route("tasks-edit") !!}';
            @else
                var url = '{!! route("tasks-show") !!}';
            @endif
            window.location.href = url.replace('%7Btasks%7D', ui.item.id);
        }
    });
</script>
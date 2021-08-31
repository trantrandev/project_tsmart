$(document).ready(function() {
    $("input[name='checkall']").click(function() {
        var checked = $(this).is(':checked');
        $('.table-checkall tbody tr td input:checkbox').attr('checked', checked);
    });  
});
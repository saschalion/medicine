$(function() {
    $('.js-search').live('keyup submit change', function() {
        $(this).ajaxSubmit({
            success: function(data) {
                $('.js-table-content').html($(data).find('.js-table'));
            },
            error: function(data) {
                $('.js-table-content').html($(data).find('.js-table'));
            },
            dataType: 'html'
        });

        return false;
    });
});
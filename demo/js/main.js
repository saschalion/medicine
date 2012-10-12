if ($('.accordion-body').hasClass('in')) {
    $('.in.collapse').parents('.accordion-group').addClass('active');
    $('.in.collapse').parents('.accordion-group').find('.accordion-icon').removeClass('icon-plus-sign').addClass('icon-minus-sign');
}

$('.accordion-toggle').live('click', function() {

    $('.accordion-group').removeClass('active');
    $('.accordion-toggle .accordion-icon').addClass('icon-plus-sign').removeClass('icon-minus-sign');

    if ($('.accordion-body').hasClass('in')) {
        $('.in.collapse').parents('.accordion-group').addClass('active');
        $('.in.collapse').parents('.accordion-group').find('.accordion-icon').removeClass('icon-plus-sign').addClass('icon-minus-sign');
    }
})

$(function() {
    var availableTags = [];

    $.getJSON('/charts/loadPatiens.php?patiens=true', function(data) {

        for (i = 0; i < data.length; i++) {
            availableTags.push(data[i]['last_name'] + ' ' + data[i]['first_name'] + ' ' + data[i]['patronymic']);
        }
    });

    $( "#tags" ).autocomplete({
        source: availableTags
    });
});
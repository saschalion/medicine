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

    $( "#tags" ).typeahead({
        source: availableTags
    });
});

function setCookie (name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

function getCookie(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
        offset = cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = cookie.indexOf(";", offset)
            if (end == -1) {
                end = cookie.length;
            }
            setStr = unescape(cookie.substring(offset, end));
        }
    }
    return(setStr);
}

flashMsg = function() {
    $(".js-message p").delay(5000).slideUp(300);
};

setcookies = function() {
    if(!getCookie('messages')) {
        setCookie('messages', id + ';', "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    }
    else {
        setCookie('messages', getCookie('messages') + id + ';', "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    }
};

$('.close').click(function() {
    id = $(this).attr('id').replace('close-', '');
    var name = $(this).parents('.alert').find('.js-name').text();

    setcookies();
    setCookie('fio', name, "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    $('.js-message').empty();
    $('.js-message').append("<p class='alert alert-success'>" + getCookie('fio') + " отменен</p>");
    flashMsg();
});



$('.submit').click(function() {
    var name = $(this).parents('.alert').find('.js-name').text();

    setCookie('fio', name, "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    $('.js-set-name').text(getCookie('fio'));
});

$(function() {
    $( "#datepicker" ).datepicker({
        showWeek: true,
        firstDay: 1
    });
});

$(function() {

    var arr = new Array(
        '08:00', 'disabled'
    )

    var value = $('.times option');

    if(arr[0] == value.text()) {
        $(value).attr('disabled');
    }
});

//$('.submit').click(function() {
//    var id = $(this).attr('id').replace('submit-', '');
//    setCookie('submit', 'submit-' + id, "Mon, 01-Dec-2012 00:00:00 GMT", "/");
//});
//
//$('.fio').append(getCookie('submit'));


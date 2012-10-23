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

$('[rel="tooltip"]').tooltip();

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

$(function() {
    var availableTags = [];

    $.getJSON('/charts/loadPreparations.php', function(data) {

        for (i = 0; i < data.length; i++) {
            availableTags.push(data[i]['name'] + ' (' + data[i]['code'] + ')');
        }
    });

    $( "#preparation" ).typeahead({
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

setcookies = function(name) {

    if(!getCookie(name)) {
        setCookie(name, id + ';', "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    }
    else {
        setCookie(name, getCookie(name) + id + ';', "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    }
};

$('.submit').click(function() {
    var name = $(this).parents('.alert').find('.js-name').text();

    setCookie('fio', name, "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    $('.js-set-name').text(getCookie('fio'));
    $('.js-set-name-post').val(getCookie('fio'));
});

// Некая авторизация

$(document).ready(function() {
    if(!getCookie('auth')) {
        $('.auth-link').trigger('click');
        $('.auth-button').click(function() {

            var authInfo = $('.auth-info').val();

            setCookie('auth', authInfo, "Mon, 01-Dec-2012 00:00:00 GMT", "/");
            window.location.href = '/demo/';
        });
    } else {

        $('.auth-text').text(getCookie('auth'));
    }
});

$('.submit').click(function() {
    var id = $(this).parents('.alert').attr('id');

    setCookie('uid', id, "Mon, 01-Dec-2012 00:00:00 GMT", "/");
});

$('.send').click(function(){
    $('.send-form').trigger('submit');
});

$('.send-form').submit(function() {

    if(!getCookie('messages')) {
        setCookie('messages', getCookie('uid') + ';', "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    }
    else {
        setCookie('messages', getCookie('messages') + getCookie('uid') + ';', "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    }
});

// Высота боковых колонок

var height = $(window).height() - 200;

$('.sidebar__inner').css('max-height', height + 'px');

//Если явился

$('.sent').click(function() {

    id = $(this).parents('.alert').attr('id');

    var name = 'sent';

    setcookies(name);

    window.location.href = '/demo/';
});

// Закрыть навсегда

$('.close').click(function() {
    id = $(this).attr('id');
    var name = $(this).parents('.alert').find('.js-name').text();

    setcookies('closed');
    setCookie('fio', name, "Mon, 01-Dec-2012 00:00:00 GMT", "/");
    $('.js-message').empty();
    $('.js-message').append("<p class='alert alert-success'>" + getCookie('fio') + " отменен</p>");
    flashMsg();
});


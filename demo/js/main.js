if ($('.accordion-body').hasClass('in')) {
    $('.in.collapse').parents('.accordion-group').addClass('active');
    $('.in.collapse').parents('.accordion-group').find('.accordion-icon').removeClass('icon-plus-sign').addClass('icon-minus-sign');
}

expiredDate = '64400';

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

    $.getJSON('/charts/loadPatiens.php', function(data) {

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
        setCookie(name, id + ';', expiredDate, "/");
    }
    else {
        setCookie(name, getCookie(name) + id + ';', expiredDate, "/");
    }
};

$('.submit').click(function() {
    var name = $(this).parents('.alert').find('.js-name').text();

    setCookie('fio', name, expiredDate, "/");
    $('.js-set-name').text(getCookie('fio'));
    $('.js-set-name-post').val(getCookie('fio'));
});

// Некая авторизация

$(document).ready(function() {
    if(!getCookie('auth')) {
        $('.auth-link').trigger('click');
        $('.auth-button').click(function() {

            var authInfo = $('.auth-info').val();

            setCookie('auth', authInfo, expiredDate, "/");
            window.location.href = '/demo/';
        });
    } else {

        $('.auth-text').text(getCookie('auth'));
    }
});

$('.submit').click(function() {
    var id = $(this).parents('.alert').attr('id');

    setCookie('uid', id, expiredDate, "/");
});

$('.send').click(function(){
    $('.send-form').trigger('submit');
});

$('.send-form').submit(function() {

    if(!getCookie('messages')) {
        setCookie('messages', getCookie('uid') + ';', expiredDate, "/");
    }
    else {
        setCookie('messages', getCookie('messages') + getCookie('uid') + ';', expiredDate, "/");
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
    setCookie('fio', name, expiredDate, "/");
    $('.js-message').empty();
    $('.js-message').append("<p class='alert alert-success'>" + getCookie('fio') + " отменен</p>");
    flashMsg();
});

$('.js-types').click(function() {

    var types = $(this).attr('data-type');
    var month = $(this).attr('data-month');

    if(!getCookie('types')) {
        setCookie('types', month + ';' + types + ';', expiredDate, "/");
    }
    else {
        setCookie('types', getCookie('types') + month + ';' + types + ';', expiredDate, "/");
    }

    window.location.href = '';
});


// Complains

$('.js-checkbox').click(function() {
    if(!$(this).hasClass('chosen')) {
        $(this).addClass('chosen').parents('.complaints-list').find('.fields').slideDown(300);
    } else {
        $(this).removeClass('chosen').parents('.complaints-list').find('.fields input[type="checkbox"]').removeAttr('checked');
        $(this).removeClass('chosen').parents('.complaints-list').find('.fields').hide();
    }
});

// Add complain

function formLink() {
    var $link = $('.js-form-link');
    var $box = $('.js-box');
    var currClass = 'b-link_type_dashed_state_current';

    $link.click(function() {
        var t = $(this);

        if(!t.hasClass(currClass)) {
            $link.removeClass(currClass);
            t.addClass(currClass);
            $box.toggleClass('hidden');
        }

        return false;
    });

    $('.js-parameter').click(function() {
        $(this).before('<div class="controls form-inline"><input type="text" name="parameter[]" placeholder="Еще параметр">' +
            ' <input type="button" class="btn btn-danger js-remove" value="x" title="Удалить"><br><br></div>');

        return false;
    });

    $('.js-parameter-add').click(function() {
        $(this).parent().append('<div class="controls form-inline"><input type="text" name="parameter[]" placeholder="Еще параметр">' +
            ' <input type="button" class="btn btn-danger js-remove" value="x" title="Удалить"><br><br></div>');

        return false;
    });

    $('.js-remove').live('click', function() {
        $(this).parent().remove();

        return false;
    });
}

formLink();


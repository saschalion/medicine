jQuery(function($){
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
            'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
            'Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        weekHeader: 'Не'};
    $.datepicker.setDefaults($.datepicker.regional['ru']);
});

$(function() {
    $( "#datepicker" ).datepicker({
        showWeek: true,
        firstDay: 1,
        minDate: 0
    });

    $( "#datepicker-2" ).datepicker({
        showWeek: true,
        firstDay: 1,
        minDate: 0
    });

    $( "#date_birth, .js-datepicker").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: ("c-100:c+0"),
        showWeek: true,
        firstDay: 1
    });

});
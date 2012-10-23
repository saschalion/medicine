$(function() {
    $( "#datepicker" ).datepicker({
        showWeek: true,
        firstDay: 1
    });

    $( "#datepicker-2" ).datepicker({
        showWeek: true,
        firstDay: 1
    });

    $( "#date_birth, .js-datepicker").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: ("c-100:c+0"),
        showWeek: true,
        firstDay: 1
    });
});
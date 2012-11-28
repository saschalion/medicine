$(document).ready(function () {

    $('#titles').change(function () {

        var country_id = $(this).val();

        if (country_id == '0') {
            $('#subtitles').html('');
            $('#subtitles').attr('disabled', true);
            return(false);
        }
        $('#subtitles').attr('disabled', true);
        $('#subtitles').html('<option>загрузка...</option>');

        var url = '/charts/load.php';

        $.get(
            url,
            "country_id=" + country_id,
            function (result) {

                if (result.type == 'error') {

                    alert('error');
                    return(false);
                }
                else {
                    var options = '';
                    $(result.regions).each(function() {
                        options += '<option value="' + $(this).attr('id') + '">' + $(this).attr('title') + '</option>';
                    });
                    $('#subtitles').html(options);
                    $('#subtitles').attr('disabled', false);
                }
            },
            "json"
        );
    });
});
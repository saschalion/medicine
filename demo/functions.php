<?php

function logout() {
    if($_GET['logout']) {
        setcookie('auth', '', 0, "/");
        setcookie('sent', '', 0, "/");
        setcookie('messages', '', 0, "/");
        $redirect = print header('Location: /demo/index.php');
    }
    return $redirect;
}

logout();

function patients() {

    $patients = array(
        array(
            'uid' => 1,
            'sex' => 'М',
            'first_name' => 'Аркадий',
            'last_name' => 'Берсеньев',
            'patronymic' => 'Иванович',
            'parameter' => 'холестерин',
            'date_birthday' => '29.06.1987',
            'disease' => 'Грипп',
            'value' => '110',
            'normal' => '100',
            'date_param' => '20/06/2012'
        ),
        array(
            'uid' => 2,
            'sex' => 'М',
            'first_name' => 'Александр',
            'last_name' => 'Дружинин',
            'patronymic' => 'Георгиевич',
            'parameter' => 'пульс',
            'date_birthday' => '29.06.1987',
            'disease' => ''
        ),
        array(
            'uid' => 3,
            'sex' => 'М',
            'first_name' => 'Алексей',
            'last_name' => 'Вдовиченков',
            'patronymic' => 'Андреевич',
            'parameter' => 'сахар',
            'date_birthday' => '29.06.1987',
            'disease' => 'Грипп',
            'value' => '120',
            'normal' => '100',
            'date_param' => '20/06/2012'
        ),
        array(
            'uid' => 13,
            'sex' => 'М',
            'first_name' => 'Аркадий',
            'last_name' => 'Берсеньев',
            'patronymic' => 'Игоревич',
            'parameter' => 'холестерин',
            'date_birthday' => '29.06.1987',
            'disease' => 'Грипп',
            'disease' => 'Грипп',
            'value' => '120',
            'normal' => '100',
            'date_param' => '20/06/2012'
        ),
        array(
            'uid' => 5,
            'sex' => 'М',
            'first_name' => 'Олег',
            'last_name' => 'Ватутин',
            'patronymic' => 'Олегович',
            'parameter' => 'холестерин',
            'date_birthday' => '29.06.1987',
            'disease' => 'Грипп'
        ),
        array(
            'uid' => 6,
            'sex' => 'М',
            'first_name' => 'Игорь',
            'last_name' => 'Иванов',
            'patronymic' => 'Степанович',
            'parameter' => 'холестерин',
            'date_birthday' => '29.06.1987',
            'disease' => 'Грипп'
        ),
        array(
            'uid' => 7,
            'sex' => 'М',
            'first_name' => 'Глеб',
            'last_name' => 'Патрошин',
            'patronymic' => 'Алексеевич',
            'parameter' => 'холестерин',
            'date_birthday' => '29.06.1987',
            'disease' => 'Грипп'
        ),
        array(
            'uid' => 8,
            'sex' => 'М',
            'first_name' => 'Андрей',
            'last_name' => 'Глухарев',
            'patronymic' => 'Сергеевич',
            'parameter' => 'холестерин',
            'date_birthday' => '29.06.1987',
            'disease' => 'Грипп'
        ),
        array(
            'uid' => 9,
            'sex' => 'М',
            'first_name' => 'Виталий',
            'last_name' => 'Степанов',
            'patronymic' => 'Иванович',
            'parameter' => 'холестерин',
            'date_birthday' => '29.06.1987',
            'disease' => 'Грипп'
        )
    );

    return $patients;
}

$patients = patients();

function create_time_range($start, $end, $by='30 mins') {

    $start_time = strtotime($start);
    $end_time   = strtotime($end);

    $current    = time();
    $add_time   = strtotime('+'.$by, $current);
    $diff       = $add_time-$current;

    $times = array();
    while ($start_time < $end_time) {
        $times[] = $start_time;
        $start_time += $diff;
    }

    $times[] = $start_time;
    return $times;
}

function disabled_time() {
    $disabled = array(
        array(
            'time' => '08:00'
        ),
        array(
            'time' => '08:30'
        ),
        array(
            'time' => '15:30'
        ),
        array(
            'time' => '09:30'
        ),
        array(
            'time' => '14:00'
        )
    );
    return $disabled;
}

$disabled = disabled_time();

function send_notification() {
//    $time = $times[$_POST['time']];
//
//    $to = $_POST['email'];
//
//    $subject = 'Вас пригласили на прием';
//
//    $message = 'Уважаемый ' . $_POST['fio'] . '! Ждем Вас на прием ' . $_POST['date'] . ' в '. $time . ' к эндокринологу (25 каб.)<br><br>С уважением, администрация ОКБ №1';
//
//    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
//    $headers .= "From: ОКБ № 1 saschalion@list.ru";
//
//    mail($to, $subject, $message, $headers);
//
//    list($sms_id, $sms_cnt, $cost, $balance) = send_sms($_POST['phone_number'], 'Уважаемый ' . $_POST['fio'] . '! Ждем Вас на прием ' . $_POST['date'] . ' в '. $time . ' к эндокринологу (25 каб.)');

    print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/index.php>";
}

function escape($value) {
    $record = mysql_real_escape_string($value);

    return $record;
}

function query($value) {
    $sql = mysql_query($value);

    return $sql;
}

function send_sql() {

    $array = array(
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'patronymic' => $_POST['patronymic'],
        'sex' => $_POST['sex'],
        'document' => $_POST['document'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
        'mobile_phone' => $_POST['mobile_phone'],
        'mobile_phone_second' => $_POST['mobile_phone_second'],
        'desease' => $_POST['desease'],
        'date_birth' => date("Y-m-d H:m:s",strtotime($_POST['date_birth'])),
    );

    if(count($array) > 0) {
        foreach($array as $key => $value) {
            $value = escape(trim($value));
            $value =  "'$value'";
            $array_keys[] = $key;
            $array_values[] = $value;
        }
    }

    $implode_key = implode(', ', $array_keys);

    $implode_value = implode(', ', $array_values);

    $sql = query("INSERT INTO patients($implode_key) values($implode_value)");

    return $sql;
}

function get_patients()
{
    $sql = query("select * from patients");

    while($records = mysql_fetch_assoc($sql))

        $new_records[] = $records;

    return $new_records;
}

function set_chart() {

    function get() {

        $type = escape('pulse');

        $sql = query("select value as y, UNIX_TIMESTAMP(date) as x, parameter_types.name as title,
        preparations.name as tooltip,
        parameter_norms.start_norm as startNorm,
        parameter_norms.end_norm as endNorm,
        parameter_norms.below_start_norm as belowStartNorm,
        parameter_norms.below_end_norm as belowEndNorm,
        parameter_norms.above_start_norm as aboveStartNorm,
        parameter_norms.above_end_norm as aboveEndNorm
        from parameters, parameter_types, preparations, parameter_norms
        where parameter_types.code in('$type') and parameters.parameter_type_id=parameter_types.id
        and parameters.preparation_id = preparations.id
        order by x asc");

        while($patients = mysql_fetch_assoc($sql))

            $records[] = $patients;

        return $records;
    }

    $stock = get();

    if($_GET['chart-pulse']) {
        $data = print json_encode($stock);
    }

    if($_GET['stock']) {
        if(isset($stock)) {
            $data = print json_encode($stock);
        }
    }

    return $data;
}

function post($field)
{
    $fields = $_POST[$field];

    return $fields;
}

function notifs()
{
    $sql = query("SELECT distinct(parameters.id), patients.last_name, patients.first_name, patients.patronymic,
parameters.date, parameters.value, LOWER(parameter_types.name) as name
FROM parameters, parameter_norms, parameter_types, patients
WHERE (value < start_norm OR value > end_norm) AND parameter_norm_id = parameter_norms.id
AND patients.id = parameters.patient_id");

    while($record = mysql_fetch_assoc($sql))

    $records[] = $record;

    return $records;
}
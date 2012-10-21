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

    print "<META HTTP-EQUIV=Refresh content=0;URL='".$_SERVER['REQUEST_URI']."'>";
}

function escape($value) {
    $record = mysql_real_escape_string($value);

    return $record;
}

function query($value) {
    $sql = mysql_query($value);

    return $sql;
}

function create_patient() {

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

function edit_patient()
{
    if($_REQUEST['save']) {
        $array = array(
            'first_name' => post('first_name'),
            'last_name' => post('last_name'),
            'patronymic' => post('patronymic'),
            'sex' => post('sex'),
            'document' => post('document'),
            'address' => post('address'),
            'phone' => post('phone'),
            'mobile_phone' => post('mobile_phone'),
            'mobile_phone_second' => post('mobile_phone_second'),
            'desease' => post('desease'),
            'date_birth' => date("Y-m-d H:m:s",strtotime(post('date_birth'))
        ));

        if (count($array) > 0) {
            foreach ($array as $key => $value) {
                $value = trim($value);
                $value = "'$value'";
                $updates[] = "$key = $value";
            }
        }

        $implode_array = implode(', ', $updates);

        $sql = query("UPDATE patients SET $implode_array where id='".escape($_SESSION['id'])."'");

        $redirect =  print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id'].">";

        return array($sql, $redirect);
    }
}

function get_patients()
{
    $sql = query("select * from patients");

    while($records = mysql_fetch_assoc($sql))

    $new_records[] = $records;

    return $new_records;
}

function get_patient($patient_id)
{
    $sql = query("select * from patients where id = $patient_id limit 1");

    while($records = mysql_fetch_assoc($sql))

    $new_records[] = $records;

    return $new_records;
}

function get_date_birth($date)
{
    return date("d.m.Y",strtotime($date));
}

function get_age($date)
{
    $age = floor((time() - strtotime($date)) / (60 * 60 * 24 * 365.25));

    $str = array(2,3,4);
    $str_two = array(11,12,13);

    if(in_array($age % 10, $str) && !in_array($age, $str_two)) {
        $val = 'года';
    }
    else {
        $val = 'лет';
    }

    $str = array(0,5,6,7,8,9);
    if(in_array($age % 10, $str)) {
        $val =  'лет';
    }

    $str = array(1);
    if(in_array($age % 10, $str)) {
        $val = 'год';
    }

    return $age . ' ' . $val;
}

function set_chart($patient_id) {

    $type = 'pulse';

    $sql = query("select value as y, unix_timestamp(date) as x, parameter_types.name as title,
        preparations.name as tooltip,
        parameter_norms.start_norm as startNorm,
        parameter_norms.end_norm as endNorm,
        parameter_norms.below_start_norm as belowStartNorm,
        parameter_norms.below_end_norm as belowEndNorm,
        parameter_norms.above_start_norm as aboveStartNorm,
        parameter_norms.above_end_norm as aboveEndNorm
        from parameters, parameter_types, preparations, parameter_norms, patients
        where parameter_types.code in('$type') and parameters.parameter_type_id=parameter_types.id
        and parameters.preparation_id = preparations.id and patients.id = '".$patient_id."'
        order by x asc");

    while($patients = mysql_fetch_assoc($sql))

    $records[] = $patients;

    return $records;
}

function get_chart() {

    $stock = set_chart(escape($_GET['patient_id']));

    $data = print json_encode($stock);

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
    parameters.date as date, parameters.value,
    (select LOWER(parameter_types.name) from parameter_types limit 1) as name,
    (select parameter_types.code from parameter_types limit 1) as code
    FROM parameters, parameter_norms, patients
    WHERE (value < start_norm OR value > end_norm) AND YEAR(date) >= '2010' AND YEAR(date) <= '2012' AND (parameter_norm_id = parameter_norms.id
    AND patients.id = parameters.patient_id) ORDER BY date DESC");

    while($record = mysql_fetch_assoc($sql))

    $records[] = $record;

    return $records;
}
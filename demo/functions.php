<?php function logout()
{
    if($_GET['logout']) {
        setcookie('auth', '', 0, "/");
        setcookie('sent', '', 0, "/");
        setcookie('messages', '', 0, "/");
        setcookie('closed', '', 0, "/");
        $redirect = print header('Location: /demo/index.php');
    }
    return $redirect;
}

logout();

function create_time_range($start, $end, $by='30 mins')
{
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

function disabled_time()
{
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

function send_notification()
{
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

function set_fields()
{
    $array = array(
        'first_name' => post('first_name'),
        'last_name' => post('last_name'),
        'patronymic' => post('patronymic'),
        'sex' => post('sex'),
        'document' => post('document'),
        'address' => trim(post('address')),
        'phone' => post('phone'),
        'mobile_phone' => post('mobile_phone'),
        'mobile_phone_second' => post('mobile_phone_second'),
        'desease' => post('desease'),
        'date_birth' => date("Y-m-d H:m:s",strtotime(post('date_birth'))
        ));
    return $array;
}

function query($value)
{
    $sql = mysql_query($value);

    return $sql;
}

function create_patient()
{
    $array = set_fields();

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

        $array = set_fields();

        if (count($array) > 0) {
            foreach ($array as $key => $value) {
                $value = trim($value);
                $value = "'$value'";
                $updates[] = "$key = $value";
            }
        }

        $implode_array = implode(', ', $updates);

        $sql = query("UPDATE patients SET $implode_array where id='".escape($_SESSION['id'])."'");

        $redirect =  print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&main=true>";

        return array($sql, $redirect);
    }
}

function get_patients()
{

    $result = explode(' ', $_REQUEST['search']);

    $sql = "select * from patients";

    if($_REQUEST['search']) {
        $sql =  $sql . " where last_name like '%$result[0]%' AND first_name like '%$result[1]%' AND patronymic like '%$result[2]%'";
    }

    $q = query($sql);

    while($records = mysql_fetch_assoc($q))

        $new_records[] = $records;

    return $new_records;
}

function get_types($patient_id)
{
    $sql = query("select distinct(patients.id), patients.last_name, patients.first_name, patients.patronymic, patients.sex,
patients.date_birth, patients.desease,
parameter_types.code from patients, parameters, parameter_types where patients.id = parameters.patient_id and
parameters.parameter_type_id = parameter_types.id and parameters.patient_id = $patient_id limit 1");

    $result = mysql_num_rows($sql);

    if($result > 0) {

        $records = mysql_fetch_assoc($sql);

        $new_records[] = $records;

        return $new_records;
    }
}

function get_patient()
{
    $sql = query("select * from patients where id = '".$_GET['patient_id']."' limit 1");

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
    $str_except = array(11,12,13);

    if(in_array($age % 10, $str) && !in_array($age, $str_except)) {
        $val = 'года';
    }
    if(in_array($age, $str_except)) {
        $val = 'лет';
    }

    $str = array(0,5,6,7,8,9);
    if(in_array($age % 10, $str)) {
        $val =  'лет';
    }

    $str = array(1);
    if(in_array($age % 10, $str) && $age != 11) {
        $val = 'год';
    }

    return $age . ' ' . $val;
}

function set_chart($patient_id, $type)
{
    $sql = query("select value as y, unix_timestamp(date) as x, parameter_types.name as title,
        patients.last_name as lname,
        patients.first_name as fname,
        patients.patronymic as patronymic,
        preparations.name as tooltip,
        parameter_norms.start_norm as startNorm,
        parameter_norms.end_norm as endNorm,
        parameter_norms.below_start_norm as belowStartNorm,
        parameter_norms.below_end_norm as belowEndNorm,
        parameter_norms.above_start_norm as aboveStartNorm,
        parameter_norms.above_end_norm as aboveEndNorm
        from parameters, parameter_types, preparations, parameter_norms, patients
        where parameter_types.code in('$type') and parameters.parameter_type_id=parameter_types.id
        and parameters.preparation_id = preparations.id and parameters.patient_id = '".escape($patient_id)."'
        and parameters.patient_id = patients.id
        order by x asc");

    if($sql) {
        while($patients = mysql_fetch_assoc($sql))

            $records[] = $patients;

        return $records;
    }
}

function get_chart($patient_id, $type)
{
    $stock = set_chart($patient_id, $type);

    $data = json_encode($stock);

    return $data;
}

function post($field)
{
    $fields = $_POST[$field];

    return $fields;
}

function notifs()
{
    $sql = query("SELECT distinct(parameters.id) as id, patients.last_name, patients.id as uid, patients.first_name, patients.patronymic,
    parameters.date as date, parameters.value,
    (select LOWER(parameter_types.name) from parameter_types where parameters.parameter_type_id = parameter_types.id limit 1) as name,
    (select parameter_types.code from parameter_types where parameters.parameter_type_id = parameter_types.id limit 1) as code
    FROM parameters, parameter_norms, patients
    WHERE (value < start_norm OR value > end_norm) AND YEAR(date) >= '2010' AND YEAR(date) <= '2012' AND (parameter_norm_id = parameter_norms.id
    AND patients.id = parameters.patient_id) ORDER BY date DESC");

//    select distinct(names), uid, fname, patr, lname, val, pid, datetime from
//(SELECT distinct(parameters.id) as pid, patients.last_name as lname, patients.id as uid,
//    patients.first_name as fname, patients.patronymic as patr,
//    parameters.date as datetime, parameters.value as val,
//    (select LOWER(parameter_types.name) from parameter_types where parameters.parameter_type_id = parameter_types.id
//    limit 1) as names,
//    (select parameter_types.code from parameter_types where parameters.parameter_type_id = parameter_types.id limit 1) as code
//    FROM parameters, parameter_norms, patients
//    WHERE (value < start_norm OR value > end_norm) AND YEAR(date) >= '2010' AND YEAR(date) <= '2012' AND (parameter_norm_id = parameter_norms.id
//        AND patients.id = parameters.patient_id) ORDER BY date DESC) as q, parameter_types

    while($record = mysql_fetch_assoc($sql))

        $records[] = $record;

    return $records;
}

function notifs_patients()
{
    $sql = query("SELECT distinct(patients.id) as id, patients.last_name, patients.first_name, patients.patronymic
    FROM parameters, parameter_norms, patients
    WHERE (value < start_norm OR value > end_norm) AND YEAR(date) >= '2010' AND YEAR(date) <= '2012' AND (parameter_norm_id = parameter_norms.id
    AND patients.id = parameters.patient_id) ORDER BY date DESC");

    while($record = mysql_fetch_assoc($sql))

        $records[] = $record;

    return $records;
}

function get_parameter_type($patient_id)
{
    $sql = query("select distinct(parameters.parameter_type_id), parameter_types.name as name, parameter_types.code as code
    from parameters, parameter_types
    where parameters.patient_id in($patient_id) AND parameters.parameter_type_id = parameter_types.id");


    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $records[] = $record;

        return $records;
    }
}

function set_preparats()
{
    $sql = query("select name, code from preparations");

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $records[] = $record;

        return $records;
    }
}

function get_preparats()
{
    $stock = set_preparats();

    $data = json_encode($stock);

    return $data;
}

function get_dispensary()
{
    $sql = query("SELECT plans.id, plans.type, patients.id as pid, plans.month, patients.first_name, patients.last_name,
    patients.patronymic FROM plans, patients where (unix_timestamp(now()) + 60*60*24*31)
    >= (unix_timestamp(concat('2012-', plans.month, '-01'))) and plans.patient_id = patients.id");

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $records[] = $record;

        return $records;
    }
}

function types($type)
{
    if($type == 'lipids') $name = 'липиды';
    if($type == 'ekg') $name = 'ЭКГ';
    if($type == 'bh') $name = 'Б/х';
    if($type == 'end') $name = 'эндокринолог';

    return $name;
}

//function get_plan($patient_id)
//{
//    $sql = "SELECT plans.id as pid, patients.id as uid, plans.date, patients.last_name, patients.first_name, patients.patronymic,
//    plans.title, plans.date_from, plans.date_to, plans.contraindications, preparations.name as preparation
//    from patients, plans, preparations where plans.patient_id = patients.id and plans.preparation_id = preparations.id";
//
//    if($patient_id) {
//        $sql = $sql . ' and plans.patient_id = "'.$patient_id.'"';
//    }
//
//    $q = query($sql);
//
//    if($q) {
//        while($record = mysql_fetch_assoc($q))
//
//            $records[] = $record;
//
//        return $records;
//    }
//}

function get_plan($patient_id)
{
    $q = "select * from plans where patient_id = '".$patient_id."'";

    $sql = query($q);

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $plans[] = $record;

        return $plans;
    }
}

function set_plan($patient_id)
{
    if($_REQUEST['type'] && $_REQUEST['month']) {

        $q = 'select * from plans where type = "'.$_REQUEST['type'].'"
                            and month = "'.$_REQUEST['month'].'" and patient_id = "'.$patient_id.'"';

        $sql = query($q);

        if(mysql_num_rows($sql) > 0) {
            query("DELETE from plans where type='".$_REQUEST['type']."' AND month='".$_REQUEST['month']."' and patient_id='".$patient_id."'");
        } else {
            query("INSERT INTO plans (`type`, `month`, `patient_id`)
                                values('".$_REQUEST['type']."', '".$_REQUEST['month']."', '".$patient_id."')");
        }

        print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&plan=true>";
    }
}

function getComplaintTitles()
{
    $q = "select * from complaint_titles";

    $sql = query($q);

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $complaints[] = $record;

        return $complaints;
    }
}

function getComplaintTitle($val = null)
{
    $q = "select * from complaint_titles where id = '".escape($val)."'";

    $sql = query($q);

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $complaints[] = $record;

        return $complaints;
    }
}

function complaintTitleEdit($complaint_title = null)
{
    if($_POST['save_title']) {

        $sql = query("UPDATE complaint_titles SET title = '".$complaint_title."' where id='".$_REQUEST['complaint-titles-edit']."'");

        $redirect =  print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&complaints=true&complaint-titles=true>";

        return array($sql, $redirect);
    }
}

function getComplaintSubTitle($val = null)
{
    $q = "select * from complaint_subtitles where id = '".escape($val)."'";

    $sql = query($q);

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $complaints[] = $record;

        return $complaints;
    }
}

function getComplaintSubTitles()
{
    $q = "select * from complaint_subtitles";

    $sql = query($q);

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $complaints[] = $record;

        return $complaints;
    }
}

// Активная родительская категория

function showCurrentCategory($category_id = null) {

    $sql_current = query("SELECT complaint_titles.id FROM complaint_titles, complaint_subtitles
    where complaint_subtitles.parent_id=complaint_titles.id AND complaint_subtitles.id='".escape($category_id)."';");

    $sql = query("SELECT * from complaint_titles");

    $result = mysql_result($sql_current, 0);

    $record = null;

 	do {
        if ($record['id'] == $result) {
            print $selected = '<option value="'.$record['id'].'" selected>' . $record['title'] . '</option>';
    }
		else {
            print $selected = '<option value="'.$record['id'].'">' . $record['title'] . '</option>';
		}
    }

    while($record = mysql_fetch_array($sql));

    return $selected;
}

// создание подкатегории

function createComplaintSubTitle()
{
    if($_POST['add_subtitle']) {
        $array = array(
            'title' => post('subtitle'),
            'parent_id' => post('titles')
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

        $sql = query("INSERT INTO complaint_subtitles($implode_key) values($implode_value)");

        $redirect = print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&complaints=true&complaint-subtitles=true>";

        return array($sql, $redirect);
    }
}

// Редактирование подкатегорий

function complaintSubTitleEdit()
{
    if($_POST['save_subtitle']) {

        $array = array(
            'title' => post(trim('complaint_subtitle')),
            'parent_id' => post('titles')
        );

        if (count($array) > 0) {
            foreach ($array as $key => $value) {
                $value = trim($value);
                $value = "'$value'";
                $updates[] = "$key = $value";
            }
        }

        $implode_array = implode(', ', $updates);

        $sql = query("UPDATE complaint_subtitles SET $implode_array where id='".$_REQUEST['complaint-subtitles-edit']."'");

        $redirect =  print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&complaints=true&complaint-subtitles=true>";

        return array($sql, $redirect);
    }
}

// Удаление подкатегории

function deleteSubtitle($node = null) {

    if($_REQUEST['delete']) {
        $sql = query("DELETE FROM complaint_subtitles WHERE id='".escape($node)."';");
        $redirect =  print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&complaints=true&complaint-subtitles=true>";
    }

    return array($sql, $redirect);
}

// Жалобы

function getComplaintTexts()
{
    $q = "select * from complaint_texts";

    $sql = query($q);

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $complaints[] = $record;

        return $complaints;
    }
}

// Жалоба

function getComplaintText($id)
{
    $q = "select * from complaint_texts where id = $id";

    $sql = query($q);

    if($sql) {
        while($record = mysql_fetch_assoc($sql))

            $complaints[] = $record;

        return $complaints;
    }
}

// Активная категория жалобы

function showCurrentTextCategory($category_id = null) {

    $sql_current = query("SELECT complaint_subtitles.id FROM complaint_subtitles, complaint_texts
    where complaint_texts.parent_id=complaint_subtitles.id AND complaint_texts.id='".escape($category_id)."';");

    $sql = query("SELECT * from complaint_subtitles");

    $result = mysql_result($sql_current, 0);

    $record = null;

    do {
        if ($record['id'] == $result) {
            print $selected = '<option value="'.$record['id'].'" selected>' . $record['title'] . '</option>';
        }
        else {
            print $selected = '<option value="'.$record['id'].'">' . $record['title'] . '</option>';
        }
    }

    while($record = mysql_fetch_array($sql));

    return $selected;
}

// Редактирование жалобы

function complaintTextEdit()
{
    if($_POST['save_text']) {

        $array = array(
            'text' => post('complaint_text'),
            'parent_id' => post('titles')
        );

        if (count($array) > 0) {
            foreach ($array as $key => $value) {
                $value = trim($value);
                $value = "'$value'";
                $updates[] = "$key = $value";
            }
        }

        $implode_array = implode(', ', $updates);

        $sql = query("UPDATE complaint_texts SET $implode_array where id='".escape($_REQUEST['complaint-texts-edit'])."'");

        $redirect =  print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&complaints=true&complaint-texts=true>";

        return array($sql, $redirect);
    }
}

// Удаление жалобы

function deleteComplaint($node = null) {

    if($_REQUEST['delete']) {
        $sql = query("DELETE FROM complaint_texts WHERE id='".escape($node)."';");
        $redirect =  print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&complaints=true&complaint-texts=true>";
    }

    return array($sql, $redirect);
}

// создание жалобы

function createComplaintText()
{
    if($_POST['add_text']) {
        $array = array(
            'text' => post('complaint_text'),
            'parent_id' => post('titles')
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

        $sql = query("INSERT INTO complaint_texts($implode_key) values($implode_value)");

        $redirect = print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$_SESSION['id']."&complaints=true&complaint-texts=true>";

        return array($sql, $redirect);
    }
}

// Обрезание текста

function wrap($str, $s) {
    $result = implode(array_slice(explode('<br>',wordwrap($str, $s, '<br>', false)), 0, 1));

    if($result != $str) {
        $result .= '...';
    }

    return $result;
}

//function complaints()
//{
//    $q = "select ctxt.text as text, ctxt.id as tid, , ct.title, cs.title as subtitle from complaints c, complaint_texts ctxt,
//    complaint_titles ct, complaint_subtitles cs
//    where ctxt.id = c.text_id AND
//    ct.id = c.title_id AND cs.id = c.subtitle_id";
//
//    $sql = query($q);
//
//    if($sql) {
//        while($record = mysql_fetch_assoc($sql))
//
//            $complaints[] = $record;
//
//        return $complaints;
//    }
//}


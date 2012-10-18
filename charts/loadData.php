<?php

include($_SERVER['DOCUMENT_ROOT'] . '/config.php');

function set_chart() {

    function escape($value) {
        $record = mysql_real_escape_string($value);

        return $record;
    }

    function query($value) {
        $sql = mysql_query($value);

        return $sql;
    }

    function get() {
        $sql = query("select value as y, UNIX_TIMESTAMP(date) as x, parameter_types.name as title,
        preparations.name as tooltip
        from parameters, parameter_types, preparations
        where parameter_types.code in('sugar') and parameters.parameter_type_id=parameter_types.id
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
        $data = print json_encode($stock);
    }

    return $data;
}

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
    set_chart();
}
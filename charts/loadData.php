<?php

include($_SERVER['DOCUMENT_ROOT'] . '/config.php');

include($_SERVER['DOCUMENT_ROOT'] . '/demo/functions.php');

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
    print get_chart($_REQUEST['patient_id'], $_REQUEST['type']);
}


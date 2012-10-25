<?php

include($_SERVER['DOCUMENT_ROOT'] . '/config.php');

include($_SERVER['DOCUMENT_ROOT'] . '/demo/functions.php');

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
    print json_encode(get_patients($result));
}

<?php

function set_norms() {

    $stock = array(
        array(
            'start_norm' =>  57,
            'end_norm' => 66,
            'below_start_norm' =>  30,
            'below_end_norm' => 56,
            'above_start_norm' =>  66,
            'above_end_norm' => 120
        )
    );

    if($_GET['stock']) {
        $data = print json_encode($stock);
    }

    return $data;
}

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
    set_norms();
}

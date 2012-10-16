<?php

function set_chart() {
    $arr = array(
        array('y' => 57, 'tooltip' => 'Анальгин'),
        array('y' => 50, 'tooltip' => 'Анальгин'),
        array('y' => 80, 'tooltip' => 'Анальгин'),
        array('y' => 30, 'tooltip' => 'Анальгин'),
        array('y' => 60, 'tooltip' => 'Анальгин'),
        array('y' => 55, 'tooltip' => 'Бисептол'),
        array('y' => 56, 'tooltip' => 'Бисептол'),
        array('y' => 40, 'tooltip' => 'Бисептол'),
        array('y' => 80, 'tooltip' => 'Тавегил'),
        array('y' => 110, 'tooltip' => 'Тавегил'),
        array('y' => 70, 'tooltip' => 'Тавегил'),
        array('y' => 65, 'tooltip' => 'Бисептол'),
        array('y' => 56, 'tooltip' => 'Бисептол'),
        array('y' => 45, 'tooltip' => 'Бисептол'),
        array('y' => 85, 'tooltip' => 'Тавегил'),
        array('y' => 66, 'tooltip' => 'Тавегил'),
        array('y' => 70, 'tooltip' => 'Тавегил')
    );

    $stock = array(
        array('y' =>  57, 'x' => 1129161600000, 'tooltip' => 'Анальгин'),
        array('y' => 50, 'x' => 1129248000000, 'tooltip' => 'Анальгин'),
        array('y' => 80, 'x' => 1130889600000, 'tooltip' => 'Тавегил'),
        array('y' => 110, 'x' => 1133395200000, 'tooltip' => 'Анальгин'),
        array('y' => 40, 'x' => 1136246400000, 'tooltip' => 'Анальгин'),
        array('y' => 50, 'x' => 1243814400000, 'tooltip' => 'Анальгин'),
        array('y' => 60, 'x' => 1246406400000, 'tooltip' => 'Тавегил'),
        array('y' => 120, 'x' => 1250035200000, 'tooltip' => 'Анальгин'),
        array('y' => 70, 'x' => 1251763200000, 'tooltip' => 'Анальгин'),
        array('y' => 55, 'x' => 1254355200000, 'tooltip' => 'Бисептол'),
        array('y' => 86, 'x' => 1257120000000, 'tooltip' => 'Бисептол'),
        array('y' => 90, 'x' => 1259625600000, 'tooltip' => 'Бисептол'),
        array('y' => 110, 'x' => 1262304000000, 'tooltip' => 'Бисептол'),
        array('y' => 40, 'x' => 1264982400000, 'tooltip' => 'Бисептол'),
        array('y' => 45, 'x' => 1267401600000, 'tooltip' => 'Анальгин'),
        array('y' => 60, 'x' => 1270080000000, 'tooltip' => 'Анальгин'),
        array('y' => 70, 'x' => 1272844800000, 'tooltip' => 'Анальгин'),
        array('y' => 80, 'x' => 1275350400000, 'tooltip' => 'Бисептол'),
        array('y' => 55, 'x' => 1277942400000, 'tooltip' => 'Анальгин'),
        array('y' => 54, 'x' => 1280707200000, 'tooltip' => 'Анальгин'),
        array('y' => 25, 'x' => 1283299200000, 'tooltip' => 'Анальгин'),
        array('y' => 45, 'x' => 1349049600000, 'tooltip' => 'Анальгин')

    );

    if($_GET['chart-pulse']) {
        $data = print json_encode($arr);
    }

    if($_GET['stock']) {
        $data = print json_encode($stock);
    }

    return $data;
}

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
    set_chart();
}

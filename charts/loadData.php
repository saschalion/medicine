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
    if($_GET['chart-pulse']) {
        $data = print json_encode($arr);
    }

    return $data;
}

set_chart();

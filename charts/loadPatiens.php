<?php

function set_patiens() {
    $arr = array(
        array('first_name' => 'Александр', 'last_name' => 'Дружинин', 'patronymic' => 'Георгиевич'),
        array('first_name' => 'Михаил', 'last_name' => 'Корольков', 'patronymic' => 'Борисович'),
        array('first_name' => 'Николай', 'last_name' => 'Берсеньев', 'patronymic' => 'Васильевич'),
        array('first_name' => 'Степан', 'last_name' => 'Васлухин', 'patronymic' => 'Семенович'),
        array('first_name' => 'Юлианна', 'last_name' => 'Пермишина', 'patronymic' => 'Андреевна'),
        array('first_name' => 'Юлия', 'last_name' => 'Мишина', 'patronymic' => 'Андреевна'),
        array('first_name' => 'Юрий', 'last_name' => 'Петров', 'patronymic' => 'Дмитриевич'),
        array('first_name' => 'Степан', 'last_name' => 'Иванов', 'patronymic' => 'Евгеньевич'),
        array('first_name' => 'Иван', 'last_name' => 'Васильев', 'patronymic' => 'Борисович'),
        array('first_name' => 'Александр', 'last_name' => 'Королев', 'patronymic' => 'Антонович'),
        array('first_name' => 'Антон', 'last_name' => 'Путин', 'patronymic' => 'Владимирович'),
        array('first_name' => 'Сергей', 'last_name' => 'Медведев', 'patronymic' => 'Александрович'),
        array('first_name' => 'Михаил', 'last_name' => 'Кучин', 'patronymic' => 'Николаевич'),
        array('first_name' => 'Николай', 'last_name' => 'Маслоу', 'patronymic' => 'Степанович'),
        array('first_name' => 'Елена', 'last_name' => 'Мухина', 'patronymic' => 'Николаевна'),
        array('first_name' => 'Мария', 'last_name' => 'Васлухин', 'patronymic' => 'Александровна'),
        array('first_name' => 'Александр', 'last_name' => 'Королев', 'patronymic' => 'Борисович'),
        array('first_name' => 'Степан', 'last_name' => 'Маршов', 'patronymic' => 'Георгиевич'),
        array('first_name' => 'Михаил', 'last_name' => 'Гарибальди', 'patronymic' => 'Борисович'),
        array('first_name' => 'Степан', 'last_name' => 'Пушкин', 'patronymic' => 'Дмитриевич'),
        array('first_name' => 'Николай', 'last_name' => 'Васнецов', 'patronymic' => 'Евгеньевич'),
        array('first_name' => 'Николай', 'last_name' => 'Уроженцев', 'patronymic' => 'Георгиевич'),
        array('first_name' => 'Степан', 'last_name' => 'Коршаков', 'patronymic' => 'Евгеньевич'),
        array('first_name' => 'Александр', 'last_name' => 'Юрибасов', 'patronymic' => 'Дмитриевич'));

    if($_GET['patiens']) {
        $data = print json_encode($arr);
    }

    return $data;
}

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
    set_patiens();
}

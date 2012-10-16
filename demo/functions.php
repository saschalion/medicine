<?php

function logout() {
    if($_GET['logout']) {
        setcookie('messages', '', 0, "/");
        setcookie('auth', '', 0, "/");
        $redirect = print header('Location: index.php');
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
        )
    );
    return $disabled;
}

$disabled = disabled_time();
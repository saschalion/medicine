<ul class="breadcrumb">
    <?php

    $urls = array(
        'show' => '/demo/show.php',
        'edit' => '/demo/edit.php',
        'new' => '/demo/new.php',
        'plan' => '/demo/plans.php'
    );

    $current_url = $_SERVER["REQUEST_URI"];

    $url = (explode('?', $current_url));

    $patient_url = "/demo/show.php?patient_id=$info[id]";

    $show = ($url[0] == $urls['show']);

    ?>

    <?php if($current_url == '/demo/') { ?>
        <li class="active">Главная</li>
    <? } else { ?>
        <li> <a href='/demo/'>Главная</a> <span class='divider'>/</span></li>
    <?php } ?>
    <?php if($url[0] == $urls['show'] && $_REQUEST['main']) { ?>
        <li class="active">
            Личная карточка
        </li>
    <?php } ?>
    <?php if($show && $_REQUEST['info']) { ?>
        <li>
            <a href="<?=$patient_url?>&type=sugar&main=true">
                Личная карточка
            </a>
            <span class='divider'>/</span>
        </li>
        <li class="active">
            Паспортные данные
        </li>
    <?php } ?>
    <?php if($show && $_REQUEST['plan']) { ?>
        <li>
            <a href="<?=$patient_url?>&type=sugar&main=true">
                Личная карточка
            </a>
            <span class='divider'>/</span>
        </li>
        <li class="active">
            План лечения
        </li>
    <?php } ?>
    <?php if($show && $_REQUEST['systems']) { ?>
        <li>
            <a href="<?=$patient_url?>&type=sugar&main=true">
                Личная карточка
            </a>
            <span class='divider'>/</span>
        </li>
        <li class="active">
            Системы
        </li>
    <?php } ?>
    <?php if($url[0] == $urls['edit']) { ?>
    <li class="active">
        Редактирование карточки
    </li>
    <?php } ?>
    <?php if($url[0] == $urls['new']) { ?>
        <li class="active">
            Добавить пациента
        </li>
    <?php } ?>
    <?php if($url[0] == $urls['plan']) { ?>
        <li class="active">
            План лечения
        </li>
    <?php } ?>
</ul>
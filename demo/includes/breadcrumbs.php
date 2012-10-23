<ul class="breadcrumb">
    <?php

    $urls = array(
        'show' => '/demo/show.php',
        'edit' => '/demo/edit.php',
        'new' => '/demo/new.php',
        'plan' => '/demo/plans.php'
    );

    $current_url = $_SERVER["REQUEST_URI"];

    $url = (explode('?', $current_url));   ?>

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
    <?php if($_REQUEST['info']) { ?>
        <li>
            <a href="/demo/show.php?patient_id=<?=$info['id']?>&type=sugar&main=true">
                Личная карточка
            </a>
            <span class='divider'>/</span>
        </li>
        <li class="active">
            Паспортные данные
        </li>
    <?php } ?>
    <?php if($_REQUEST['plan']) { ?>
        <li>
            <a href="/demo/show.php?patient_id=<?=$info['id']?>&type=sugar&main=true">
                Личная карточка
            </a>
            <span class='divider'>/</span>
        </li>
        <li class="active">
            План лечения
        </li>
    <?php } ?>
    <?php if($url[0] == $urls['edit']) { ?>
    <li>
        <a class="active">Редактирование карточки</a>
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
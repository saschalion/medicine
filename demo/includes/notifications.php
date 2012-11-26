<?php

$patients = notifs();

$names = notifs_patients();

$str = explode(';', $_COOKIE['messages']);
$sent = explode(';', $_COOKIE['sent']);
$closed = explode(';', $_COOKIE['closed']);

echo '<div class="js-message"></div>';

foreach($names as $name) { ?>

    <div class="alert alert-info" id="<?=$id?>">

        <a href="/demo/show.php?patient_id=<?=$name['id']?>&main=true" id="<?=$id?>" class="js-chart-link js-name">
            <strong>
                <?=$name['last_name'] .' '. $name['first_name'] .' '. $name['patronymic']?>
            </strong>
        </a>

        <?php for($i=0;$i<count($patients); $i++) {

        $id = $patients[$i]['id'];

        $uid = $patients[$i]['uid'];

        if($name['id'] == $uid) {  ?>

        <span class="label label-important"><?=$patients[$i]['name']?>: <?=$patients[$i]['value']?></span> за

        <b><?=date("d.m.Y",strtotime($patients[$i]['date']))?></b><br>
        <?php } } ?>
        <br><br>
        <?php if(!in_array($id, $str)) { ?>
        <button type="button" class="btn btn-success submit" data-toggle="modal" href="#myModal">Вызвать</button>
        <?php } else { ?>
        <button type="button" class="close" title="Никогда не показывать" id="<?=$patients[$i]['id']?>" data-dismiss="alert">×</button>
        <button type="button" class="btn btn-success">Отправлено</button>
        <button type="button" class="btn btn-danger sent" rel="tooltip" data-original-title="Пациент явился">Отметить явку</button>
        <?php } ?>
    </div>

    <?php } ?>
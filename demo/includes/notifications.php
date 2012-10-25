<?php

$patients = notifs();

$str = explode(';', $_COOKIE['messages']);
$sent = explode(';', $_COOKIE['sent']);
$closed = explode(';', $_COOKIE['closed']);

echo '<div class="js-message"></div>';

for($i=0;$i<count($patients); $i++) {

    $id = $patients[$i]['id'];

    $uid = $patients[$i]['uid'];

    if(!in_array($id, $sent) && !in_array($id, $closed))  { ?>

    <div class="alert
    <?php if(in_array($id, $str)) { echo 'alert-success'; } else { echo 'alert-info'; } ?>" id="<?=$id?>">

            <a href="/demo/show.php?patient_id=<?=$uid?>&type=<?=$patients[$i]['code']?>&main=true" id="<?=$id?>" rel="tooltip" data-original-title="Просмотреть график по <?=$patients[$i]['name']?>у">
                <strong>
                    <?=$patients[$i]['last_name'] .' '. $patients[$i]['first_name'] .' '. $patients[$i]['patronymic']?>
                </strong>
            </a>
         имеет <span class="label label-important"><?=$patients[$i]['name']?>: <?=$patients[$i]['value']?></span> за

        <b><?=date("d.m.Y",strtotime($patients[$i]['date']))?></b>.

        <br><br>
        <?php if(!in_array($id, $str)) { ?>
            <button type="button" class="btn btn-success js-dialog-link" data-toggle="modal" href="#myModal" data-uid="<?=$uid?>">Вызвать</button>
        <?php } else { ?>
            <button type="button" class="close" title="Никогда не показывать" id="close-<?=$patients[$i]['id']?>" data-dismiss="alert">×</button>
            <button type="button" class="btn btn-success">Отправлено</button>
            <button type="button" class="btn btn-danger sent" rel="tooltip" data-original-title="Пациент явился">Отметить явку</button>
        <?php } ?>
    </div>

<?php }  } ?>
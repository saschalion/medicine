<?php

$patients = notifs();

$str = explode(';', $_COOKIE['messages']); $sent = explode(';', $_COOKIE['sent']);

for($i=0;$i<count($patients); $i++) {

        $uid = $patients[$i]['id'];

        if(!in_array($uid, $sent)) { ?>

        <div class="alert
        <?php if(in_array($uid, $str)) { echo 'alert-success'; } else { echo 'alert-info'; } ?>" id="<?=$uid?>">
            <strong class="js-name">
                <a href="/charts/chart.php?<?=$patients[$i]['code']?>=true" rel="tooltip" data-original-title="Просмотреть график по <?=$patients[$i]['name']?>у">
                    <?=$patients[$i]['last_name'] .' '. $patients[$i]['first_name'] .' '. $patients[$i]['patronymic']?></a>
            </strong> имеет <span class="label label-important"><?=$patients[$i]['name']?>: <?=$patients[$i]['value']?></span> за

            <b><?=date("d.m.Y",strtotime($patients[$i]['date']))?></b>.

            <br><br>
            <?php if(!in_array($uid, $str)) { ?>
                <button type="button" class="btn btn-success submit" data-toggle="modal" href="#myModal">Вызвать</button>
            <?php } else { ?>
                <button type="button" class="btn btn-success">Отправлено</button>
                <button type="button" class="btn btn-info sent" rel="tooltip" data-original-title="Не показывать больше">Явился</button>
            <?php } ?>
        </div>

    <?php }  } ?>

<div class="js-message"></div>
<?php $str = explode(';', $_COOKIE['messages']); $sent = explode(';', $_COOKIE['sent']);

for($i=0;$i<count($patients); $i++) {

    $uid = $patients[$i]['uid'];

    if($patients[$i]['value'] > $patients[$i]['normal']) {
        if(!in_array($uid, $sent)) { ?>

        <div class="alert
        <?php if(in_array($uid, $str)) { echo 'alert-success'; } else { echo 'alert-info'; } ?>" id="<?=$patients[$i]['uid']?>">
            <strong class="js-name">
                <a href="show.php?<?=$uid?>" rel="tooltip" data-original-title="Просмотреть график по <?=$patients[$i]['parameter']?>у">
                    <?=$patients[$i]['last_name'] .' '. $patients[$i]['first_name'] .' '. $patients[$i]['patronymic']?></a>
            </strong> имеет <span class="label label-important"><?=$patients[$i]['parameter']?>: <?=$patients[$i]['value']?></span> за <b><?=$patients[$i]['date_param']?></b>.
            <br><br>
            <?php if(!in_array($uid, $str)) { ?>
                <button type="button" class="btn btn-success submit" data-toggle="modal" href="#myModal">Вызвать</button>
            <?php } else { ?>
                <button type="button" class="btn btn-success">Отправлено</button>
                <button type="button" class="btn btn-info sent" rel="tooltip" data-original-title="Не показывать больше">Явился</button>
            <?php } ?>
        </div>

    <?php } } } ?>

<div class="js-message"></div>
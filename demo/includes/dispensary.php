<?php

$dispensaries = get_dispensary();

$str_d = explode(';', $_COOKIE['messages-dispensary']);
$sent_d = explode(';', $_COOKIE['sent-dispensary']);
$closed_d = explode(';', $_COOKIE['closed-dispensary']);

echo '<div class="js-message"></div>';

for($i=0;$i<count($dispensaries); $i++) {

    $id = $dispensaries[$i]['plan_id'];

    $uid = $dispensaries[$i]['uid'];

    if(!in_array($id, $sent_d) && !in_array($id, $closed_d))  { ?>

    <div class="alert
    <?php if(in_array($id, $str_d)) { echo 'alert-success'; } else { echo 'alert-info'; } ?>" id="<?=$id?>">

            <a href="/demo/show.php?patient_id=<?=$uid?>&type=<?=$patients[$i]['code']?>&plan=true" id="<?=$id?>" class="js-chart-link js-name" rel="tooltip" data-original-title="Просмотреть график по <?=$patients[$i]['name']?>у">
                <strong>
                    <?=$dispensaries[$i]['last_name'] .' '. $dispensaries[$i]['first_name'] .' '. $dispensaries[$i]['patronymic']?>
                </strong>
            </a> ожидает вызова
        по причине: <span class="label label-important"><?=$dispensaries[$i]['title']?></span>

        с <b><?=date("d.m.Y",strtotime($dispensaries[$i]['date_from']))?></b> по
        <b><?=date("d.m.Y",strtotime($dispensaries[$i]['date_to']))?></b>.

        <br><br>
        <?php if(!in_array($id, $str_d)) { ?>
            <button type="button" class="btn btn-success submit-disp" data-toggle="modal" href="#myModal">Вызвать</button>
        <?php } else { ?>
            <button type="button" class="close" title="Никогда не показывать" id="close-disp-<?=$dispensaries[$i]['id']?>" data-dismiss="alert">×</button>
            <button type="button" class="btn btn-success">Отправлено</button>
            <button type="button" class="btn btn-danger sent-disp" rel="tooltip" data-original-title="Пациент явился">Отметить явку</button>
        <?php } ?>
    </div>

<?php }  } ?>
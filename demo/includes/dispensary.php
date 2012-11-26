<?php

$dispensaries = get_dispensary();

if($dispensaries) {

foreach($dispensaries as $key => $plan) {  ?>

    <div class="alert alert-info">
        <a href="/demo/edit.php?patient_id=<?=$plan['pid']?>&plan=true">
            <strong>
                <?=$plan['last_name'] .' '. $plan['first_name'] .' '. $plan['patronymic']?>
            </strong>
        </a> ожидает вызова для планового обследования по показателю: <span class="label label-important"><?=types($plan['type'])?></span>

        <b><?=date("d.m.Y", strtotime('2012-' .$plan['month']. '-01'))?></b>.

        <br><br>
        <button type="button" class="btn btn-success submit-disp" data-toggle="modal" href="#myModal">Вызвать</button>
    </div>

<?php } } else { echo '<p>Нет плановых вызовов.</p>';} ?>
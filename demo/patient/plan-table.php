<table class="table">
    <thead>
    <tr>
        <th>Процедуры</th>
        <th>Январь</th>
        <th>Февраль</th>
        <th>Март</th>
        <th>Апрель</th>
        <th>Май</th>
        <th>Июнь</th>
        <th>Июль</th>
        <th>Август</th>
        <th>Сентябрь</th>
        <th>Октябрь</th>
        <th>Ноябрь</th>
        <th>Декабрь</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $month = array('jan', 'feb', 'mar', 'apr', 'may', 'june', 'july', 'august', 'sep', 'oct', 'nov', 'dec');

    $types = array(
        array('type' => 'lipids', 'name' => 'Липиды'),
        array('type' => 'ekg', 'name' => 'ЭКГ'),
        array('type' => 'bh', 'name' => 'Б/х'),
        array('type' => 'end', 'name' => 'Эндокринолог')
    );

    $plans = get_plan($patient_id);

    set_plan($patient_id);

    $arr = array();

    if($plans) {
        foreach($plans as $n) {
            $arr[$n['type'] . '_' . $n['month']] = $n;
        }
    } else {
        echo '<p>План еще на заполнен.</p>';
    }

    foreach($types as $key) { ?>

                        <tr>
                            <td>
                                <?=$key['name']?>
                            </td>
        <? for($i=0;$i < count($month); $i++) {

            $plan_url = $url . '&plan=true&month=' . $month[$i] . '&type=' . $key['type']?>

            <td>
                <?php if(array_key_exists($key['type'] . '_' . $month[$i], $arr)): ?>
                <a class="btn btn-small btn-success js-types" href="<?=$plan_url?>"><i class="icon-ok"></i></a>
                <? else: ?>
                <a class="btn btn-small js-types" href="<?=$plan_url?>"><i class="icon-ok"></i></a>
                <? endif ?>
            </td>

            <?  } echo '</tr>'; } ?>
    </tbody>
</table>
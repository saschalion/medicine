<h2>План лечения</h2>
<ul class="nav nav-tabs">
    <li class="active">
        <a href="#">2012</a>
    </li>
</ul>
<div>
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

        $month = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');

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
                $arr[$n['type'] . '_' . $n['month'] . '_' . $n['status']] = $n;
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
                    <?php if(array_key_exists($key['type'] . '_' . $month[$i] . '_expired', $arr)) { ?>
                        <a class="btn btn-small btn-danger js-types" rel="tooltip" data-original-title="Не явился">
                            <i class="icon-remove"></i>
                        </a>
                    <?php } elseif(array_key_exists($key['type'] . '_' . $month[$i] . '_active', $arr)) { ?>
                        <a class="btn btn-small btn-success js-types" rel="tooltip" data-original-title="Удалить" href="<?=$plan_url?>">
                            <i class="icon-ok"></i>
                        </a>
                    <? } else { ?>
                        <a class="btn btn-small js-types btn-info" rel="tooltip" data-original-title="Добавить" href="<?=$plan_url. '&status=active'?>">
                            <i class="icon-ok"></i>
                        </a>
                    <?php } ?>
                </td>
                <?  } echo '</tr>'; } ?>
        </tbody>
    </table>
</div>
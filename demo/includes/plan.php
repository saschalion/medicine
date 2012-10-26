<?php $plans = get_plan($patient_id); if($plans) { ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>
                Дата
            </th>
            <th>
                Название
            </th>
            <th>
                ФИО
            </th>
            <th>
                Препараты
            </th>
            <th>
                Вызвать с
            </th>
            <th>
                До
            </th>
            <th>
                Противопоказания
            </th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($plans as $plan) { ?>
                <tr>
                    <td>
                        <?=$plan['pid']?>
                    </td>
                    <td>
                        <?=date("d.m.Y",strtotime($plan['date']))?>
                    </td>
                    <td>
                        <?=$plan['title']?>
                    </td>
                    <td>
                        <?=$plan['last_name'] . ' ' . $plan['first_name'] .' '. $plan['patronymic']?>
                    </td>
                    <td>
                        <?=$plan['preparation']?>
                    </td>
                    <td>
                        <?=date("d.m.Y",strtotime($plan['date_from']))?>
                    </td>
                    <td>
                        <?=date("d.m.Y",strtotime($plan['date_to']))?>
                    </td>
                    <td style="max-width: 200px;">
                        <?=$plan['contraindications']?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <p>Нет данных.</p>
<?php } ?>
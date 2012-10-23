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
        <?php $plans = get_plan($patient_id); foreach($plans as $plan) { ?>
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
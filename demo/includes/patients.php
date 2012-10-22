<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>
            Фамилия
        </th>
        <th>
            Имя
        </th>
        <th>
            Отчество
        </th>
        <th>
            Пол
        </th>
        <th>
            Дата рождения
        </th>
        <th>
            Заболевание
        </th>
        <th>
            Действия
        </th>
    </tr>
    </thead>
    <tbody>
    <?php $patient = get_patients(); foreach($patient as $patient) { ?>
    <tr>
        <td>
            <?=$patient['id']?>
        </td>
        <td>
            <?=$patient['last_name']?>
        </td>
        <td>
            <?=$patient['first_name']?>
        </td>
        <td>
            <?=$patient['patronymic']?>
        </td>
        <td>
            <?=$patient['sex']?>
        </td>
        <td>
            <?php
                if($patient['date_birth'] != 0) {
                    echo get_date_birth($patient['date_birth']);
                }
            ?>
        </td>
        <td>
            <?=$patient['desease']?>
        </td>
        <td>
            <a title="Редактировать" href="edit.php?patient_id=<?=$patient['id']?>" class="btn">
                <i class="icon-pencil"></i>
            </a>
            <a id="<?=$patient['id']?>" title="Просмотр" href="show.php?patient_id=<?=$patient['id']?>" class="btn js-chart-link">
                <i class="icon-eye-open"></i>
            </a>
        </td>
    </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination pagination-centered">
    <ul>
        <li class="disabled"><a href="#">«</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
    </ul>
</div>
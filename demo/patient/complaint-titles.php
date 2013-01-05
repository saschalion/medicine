<h2>Заголовки жалоб</h2>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/includes/complaint-menu.php')?>
<?php $url = $url . '&complaints=true';?>
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>
            Заголовок
        </th>
    </tr>
    </thead>
    <tbody>
    <?php $complaintTitles = getComplaintTitles(); if($complaintTitles) { foreach($complaintTitles as $title) { ?>
    <tr>
        <td>
            <?=$title['id']?>
        </td>
        <td>
            <a title="Редактировать" href="<?=$url . '&complaint-titles-edit=' . $title['id']; ?>">
                <?=$title['title']?>
            </a>
        </td>
    </tr>
        <?php } } else echo '<tr><td colspan="2"><p>Ничего не найдено.</p></td></tr>' ?>
    </tbody>
</table>
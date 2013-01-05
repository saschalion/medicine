<h2>Подразделы жалоб</h2>
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
<?php
$complaintTitles = getComplaintTitles();
$complaintSubTitles = getComplaintSubTitles();
deleteSubtitle($delete);
foreach($complaintTitles as $title) { ?>
    <tr>
        <th colspan="3">
            <?=$title['title']?>
        </th>
    </tr>
    <?php foreach($complaintSubTitles as $subtitle) if($subtitle['parent_id'] == $title['id']) { { ?>
    <tr>
        <td>
            <?=$subtitle['id']?>
        </td>
        <td>
            <a title="Редактировать" href="<?=$url . '&complaint-subtitles-edit=' . $subtitle['id']; ?>">
                <?=$subtitle['title']?>
            </a>
        </td>
        <td>
            <a title="Удалить" href="<?=$url . '&complaint-subtitles=true&delete=' . $subtitle['id']; ?>">
                Удалить
            </a>
        </td>
    </tr>
    <?php } } } ?>
    </tbody>
</table>
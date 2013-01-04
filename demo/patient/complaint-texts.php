<h2>Список жалоб</h2>
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
$complaints = getComplaintTexts();
$complaintParams = getParams();
deleteComplaint($delete);
foreach($complaintTitles as $title) {  ?>
    <tr>
        <th colspan="3">
            <h4><?=$title['title']?></h4>
        </th>
    </tr>
    <?php foreach($complaintSubTitles as $subtitle) { ?>
        <?php if($title['id'] == $subtitle['parent_id']) { ?>
            <tr>
                <th colspan="3">
                    <?=$subtitle['title']?>
                </th>
            </tr>
            <?php foreach($complaints as $complaint) if($complaint['parent_id'] == $subtitle['id']) { { ?>
            <tr>
                <td>
                    <?=$complaint['id']?>
                </td>
                <td>
                    <a title="Редактировать" href="<?=$url . '&complaint-texts-edit=' . $complaint['id']; ?>">
                        <?=wrap($complaint['text'], 150);?>
                        <?php
                            if(!empty($complaint['title'])) {
                                echo '<b>' . $complaint['title'] . '</b>';
                            }
                        ?>
                    </a>
                </td>
                <td>
                    <a title="Удалить" href="<?=$url . '&complaint-texts=true&delete=' . $complaint['id']; ?>">
                        Удалить
                    </a>
                </td>
            </tr>
    <?php } } } } } ?>
    </tbody>
</table>
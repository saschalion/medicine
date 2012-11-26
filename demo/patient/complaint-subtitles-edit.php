<?php
complaintSubTitleEdit($complaint_subtitle);
$complaintTitles = getComplaintTitles();
$complaint_subtitle = getComplaintSubTitle($_REQUEST['complaint-subtitles-edit']);
complaintSubTitleEdit();
?>

<h2>Редактировать заголовок &laquo;<?=$complaint_subtitle[0]['title'];?>&raquo;</h2>
<?php $url = $url . '&complaints=true';?>
<form action="" method="post">
    <div class="control-group">
        <label class="control-label" for="titles">
            Родительская категория
        </label>
        <div class="controls">
            <select name="titles" id="titles">
                <?php showCurrentCategory($_REQUEST['complaint-subtitles-edit']);?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="complaint-subtitle">
            Заголовок
        </label>
        <div class="controls">
            <input type="text" id="complaint-subtitle" name="complaint_subtitle" value="<?=$complaint_subtitle[0]['title'];?>">
        </div>
    </div>
    <input type="submit" name="save_subtitle" class="btn" value="Сохранить">
</form>
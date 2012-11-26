<?php
complaintTitleEdit($complaint_title);

$complaint_title = getComplaintTitle($_REQUEST['complaint-titles-edit']);?>

<h2>Добавть заголовок &laquo;<?=$complaint_title[0]['title'];?>&raquo;</h2>
<?php $url = $url . '&complaints=true';?>
<form action="" method="post">
    <div class="control-group">
        <label class="control-label" for="complaint-title">
            Заголовок
        </label>
        <div class="controls">
            <input type="text" id="complaint-title" name="complaint_title" value="<?=$complaint_title[0]['title'];?>">
        </div>
    </div>
    <input type="submit" name="save_title" class="btn" value="Сохранить">
</form>
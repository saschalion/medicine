<?php
$text = getComplaintText($_REQUEST['complaint-texts-edit']);
complaintTextEdit();
?>

<h2>Редактировать жалобу</h2>
<?php $url = $url . '&complaints=true';?>
<form action="" method="post">
    <div class="control-group">
        <label class="control-label" for="titles">
            Родительская категория
        </label>
        <div class="controls">
            <select name="titles" id="titles">
                <?php showCurrentTextCategory($_REQUEST['complaint-texts-edit']);?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="complaint-text">
            Жалоба
        </label>
        <div class="controls">
            <textarea id="complaint-text" rows="10" name="complaint_text"><?=$text[0]['text']?></textarea>
        </div>
    </div>
    <input type="submit" name="save_text" class="btn" value="Сохранить">
</form>
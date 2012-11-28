<?php
$titles = getComplaintTitles();

$subTitles = setComplaintSubTitles($_REQUEST['titles']);
createComplaintText();
?>

<h2>Добавить жалобу</h2>
<?php $url = $url . '&complaints=true';?>
<form action="" method="post" class="js-add">
    <div class="js-table-content">
        <div class="js-table">
            <div class="control-group">
                <label class="control-label" for="titles">
                    Категория
                </label>
                <div class="controls">
                    <select name="titles" id="titles">
                        <?php foreach($titles as $title) {  ?>
                            <option value="<?=$title['id']?>"><?=$title['title']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="titles">
                    Подкатегория
                </label>
                <div class="controls">
                    <select name="subtitles" id="subtitles" disabled>
                        <option value="0"></option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="complaint-text">
                    Жалоба
                </label>
                <div class="controls">
                    <textarea id="complaint-text" rows="10" name="complaint_text"></textarea>
                </div>
            </div>
            <input type="submit" name="add_text" class="btn" value="Сохранить">
        </div>
    </div>
</form>
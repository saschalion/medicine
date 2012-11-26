<?php
$titles = getComplaintSubTitles();
createComplaintText();
?>

<h2>Добавить жалобу</h2>
<?php $url = $url . '&complaints=true';?>
<form action="" method="post">
    <div class="control-group">
        <label class="control-label" for="titles">
            Родительская категория
        </label>
        <div class="controls">
            <select name="titles" id="titles">
                <option value="0">Выбрать</option>
                <?php foreach(getComplaintSubTitles() as $title) { ?>
                    <option value="<?=$title['id']?>"><?=$title['title']?></option>
                <?php } ?>
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
</form>
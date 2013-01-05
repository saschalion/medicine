<?php
$titles = getComplaintTitles();
createComplaintSubTitle();
?>

<h2>Добавить заголовок</h2>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/includes/complaint-menu.php')?>
<?php $url = $url . '&complaints=true';?>
<form action="" method="post">
    <div class="control-group">
        <label class="control-label" for="titles">
            Родительская категория
        </label>
        <div class="controls">
            <select name="titles" id="titles">
                <option value="0">Выбрать</option>
                <?php foreach(getComplaintTitles() as $title) { ?>
                    <option value="<?=$title['id']?>"><?=$title['title']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="subtitle">
            Заголовок
        </label>
        <div class="controls">
            <input type="text" id="subtitle" name="subtitle" value="">
        </div>
    </div>
    <input type="submit" name="add_subtitle" class="btn" value="Сохранить">
</form>
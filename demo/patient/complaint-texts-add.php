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
                    <a class="b-link_type_dashed b-link_type_dashed_state_current js-form-link" href="#">Текст жалобы</a>
                    или <a class="b-link_type_dashed js-form-link" href="#">подзаголовок</a>
                </label>
                <div class="controls js-box">
                    <textarea id="complaint-text" rows="10" name="complaint_text"></textarea>
                </div>
                <div class="js-box hidden">
                    <div class="controls">
                        <input type="text" value="" name="parameter_title"/>
                    </div>
                    <div class="controls">
                        <label class="control-label">
                            Параметры
                        </label>
                        <div class="form-inline">
                            <input type="text" name="parameter[]" placeholder="Введите параметр">
                            <input type="button" class="btn btn-success js-parameter" value="+" title="Добавить еще значение">
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" name="add_text" class="btn js-box" value="Сохранить">
            <input type="submit" name="add_text_parameters" class="btn js-box hidden" value="Сохранить">
        </div>
    </div>
</form>


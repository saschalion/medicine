<?php
$text = getComplaintText($_REQUEST['complaint-texts-edit']);
complaintTextEdit();
$params = getCurrentParams();
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
    <?php if(!empty($text[0]['text'])) { ?>
        <div class="control-group">
            <label class="control-label" for="complaint-text">
                Жалоба
            </label>
            <div class="controls">
                <textarea id="complaint-text" rows="10" name="complaint_text"><?=$text[0]['text']?></textarea>
            </div>
        </div>
    <?php } ?>
    <?php if(!empty($text[0]['title'])) { ?>
    <div class="control-group">
        <label class="control-label">
            Заголовок
        </label>
        <input type="text" name="title" value="<?=$text[0]['title']?>">
    </div>
    <?php } ?>
    <?php if(!empty($params)) { ?>
        <div class="control-group">
            <label class="control-label">
                Параметры
            </label>
            <?php foreach($params as $param) { ?>
                <div class="form-inline">
                    <input type="text" name="parameter[]" value="<?=$param['parameter']?>">
                    <a class="btn btn-danger" title="Удалить"
                       href="<?=$url . '&complaints=true&complaint-texts-edit=' .
                           $text[0]['id'] . '&delete=' . $param['id'] ?>">x</a>
                    <br><br>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <input type="submit" name="save_text" class="btn" value="Сохранить">
</form>
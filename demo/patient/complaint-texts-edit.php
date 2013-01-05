<?php
$text = getComplaintText($_REQUEST['complaint-texts-edit']);
complaintTextEdit();
$params = getCurrentParams();
$_SESSION['complaint'] = $text[0]['id'];
deleteParam($deleteparam);
complaintParams($_REQUEST['complaint-texts-edit']);
?>

<h2>Редактировать жалобу</h2>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/includes/complaint-menu.php')?>
<?php $url = $url . '&complaints=true'; ?>
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
                    <input type="hidden" value="<?=$param['id']?>" name="param_id[]">
                    <input type="text" name="parameter[]" value="<?=$param['parameter']?>">
                    <a class="btn btn-danger" title="Удалить"
                       href="<?=$url . '&complaints=true&complaint-texts-edit=' .
                           $text[0]['id'] . '&deleteparam=' . $param['id'] ?>">x</a>
                    <br><br>
                </div>
            <?php } ?>
            <div>
                <input type="button" class="btn btn-success js-parameter" value="Добавить" title="Добавить еще значение">
            </div>
        </div>
    <?php } else { ?>
    <div class="control-group">
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
    <?php } ?>
    <?php if(!empty($text[0]['title'])) { ?>
        <input type="submit" name="save_params" class="btn" value="Сохранить">
    <?php } else { echo '<input type="submit" name="save_text" class="btn" value="Сохранить">'; } ?>
</form>
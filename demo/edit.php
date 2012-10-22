<?php include('includes/head.php'); ?>
<?php session_start();
$patient = get_patient($patient_id); $arr = edit_patient();

?>
<?php include('includes/header.php'); ?>
<div role="main">
    <?php include('includes/login.php'); ?>
    <div class="span12">
        <?=$message?>
        <?php foreach($patient as $info) { ?>
        <h2>
            Редактировать карточку пациента
            <?=$info['last_name'] .' '. $info['first_name'] .' '. $info['patronymic']?>
        </h2>
        <form action="" method="post">
            <div class="control-group">
                <label class="control-label" for="last_name">
                    Фамилия
                </label>
                <div class="controls">
                    <input type="text" id="last_name" name="last_name" value="<?=$info['last_name']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="first_name">
                    Имя
                </label>
                <div class="controls">
                    <input type="text" id="first_name" name="first_name" value="<?=$info['first_name']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="patronymic">
                    Отчество
                </label>
                <div class="controls">
                    <input type="text" id="patronymic" name="patronymic" value="<?=$info['patronymic']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="sex">
                    Пол
                </label>
                <div class="controls">
                    <input type="text" id="sex" name="sex" value="<?=$info['sex']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="date_birth">
                    Дата рождения
                </label>
                <div class="controls">
                    <input type="text" id="date_birth" name="date_birth" value="<?=get_date_birth($info['date_birth'])?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="document">
                    Паспортные данные
                </label>
                <div class="controls">
                    <input type="text" id="document" name="document" value="<?=$info['document']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="address">
                    Адрес
                </label>
                <div class="controls">
                    <input type="text" id="address" name="address" value="<?=$info['address']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="phone">
                    Телефон
                </label>
                <div class="controls">
                    <input type="text" id="phone" name="phone" value="<?=$info['phone']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mobile_phone">
                    Мобильный телефон
                </label>
                <div class="controls">
                    <input type="text" id="mobile_phone" name="mobile_phone" value="<?=$info['mobile_phone']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mobile_phone_second">
                    Мобильный телефон 2
                </label>
                <div class="controls">
                    <input type="text" id="mobile_phone_second" name="mobile_phone_second" <?=$info['mobile_phone_second']?>>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="desease">
                    Болезнь
                </label>
                <div class="controls">
                    <input type="text" id="desease" name="desease" value="<?=$info['desease']?>">
                </div>
            </div>
            <input type="submit" name="save" class="btn" value="Сохранить">
            <? } ?>
        </form>
    </div>
</div>

<script src="js/plugins.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/modernizr-2.6.1.min.js"></script>
<script src="js/vendor/bootstrap-alert.js"></script>
<script src="js/vendor/bootstrap-typehead.js"></script>
<script src="js/vendor/bootstrap-tooltip.js"></script>

<script src="js/main.js"></script>
<script src="js/datepicker.js"></script>
</body>
</html>
<?php $_SESSION['id'] = $patient_id;?>
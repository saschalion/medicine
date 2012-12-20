<?php session_start(); include('includes/head.php'); ?>
<?php $patient = get_patient($patient_id); $arr = edit_patient(); ?>
<?php include('includes/header.php'); ?>
<div role="main">
<?php include('includes/login.php'); ?>
<div class="span12">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/includes/breadcrumbs.php')?>
<?=$message?>
<?php foreach($patient as $info) {
    $url = '/demo/edit.php?patient_id=' . $info['id']; ?>
<h2>
    Редактировать карточку пациента
    <?=$info['last_name'] .' '. $info['first_name'] .' '. $info['patronymic']?>
</h2>
<div class="clearfix">
    <a style="float: right" href="show.php?patient_id=<?=$info['id']?>&main=true&type=pulse" class="btn">
        <i class="icon-eye-open"></i>
        Просмотреть карточку
    </a>
    <br> <br>
</div>
<ul class="nav nav-tabs">
    <li class="<?php if($_REQUEST['main']) echo 'active';?>">
        <a href="<?=$url?>&main=true">Паспортные данные</a>
    </li>
    <li class="<?php if($_REQUEST['parameters']) echo 'active';?>">
        <a href="<?=$url?>&parameters=true">Показатели</a>
    </li>
    <li class="<?php if($_REQUEST['main-complaints'] || $_REQUEST['complaints']) echo 'active';?>">
        <a href="<?=$url?>&main-complaints=true">Жалобы основные</a>
    </li>
    <li class="<?php if($_REQUEST['systems']) echo 'active';?>">
        <a href="<?=$url?>&systems=true">Системы</a>
    </li>
    <li class="<?php if($_REQUEST['plan']) echo 'active';?>">
        <a href="<?=$url?>&plan=true">План лечения</a>
    </li>
    <li class="<?php if($_REQUEST['history']) echo 'active';?>">
        <a href="<?=$url?>&history=true">Анамнез</a>
    </li>
</ul>
    <?php if($_REQUEST['main']) { ?>
    <h2>Основные данные</h2>
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
                <textarea id="address" name="address"><?=$info['address']?></textarea>
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
        <? } ?>
<?php if($_REQUEST['parameters']) { ?>
    <h2>Добавить показатели</h2>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/parameters.php')?>
<? } ?>

<?php if($_REQUEST['main-complaints']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaints.php')?>
<? } ?>

<?php if($_REQUEST['complaint-titles']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaint-titles.php')?>
<? } ?>

<?php if($_REQUEST['complaint-titles-edit']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaint-titles-edit.php')?>
<? } ?>

<?php if($_REQUEST['complaint-subtitles']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaint-subtitles.php')?>
<? } ?>

<?php if($_REQUEST['complaint-subtitles-edit']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaint-subtitles-edit.php')?>
<? } ?>

<?php if($_REQUEST['complaint-subtitles-add']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaint-subtitles-add.php')?>
<? } ?>

<?php if($_REQUEST['complaint-texts']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaint-texts.php')?>
<? } ?>

<?php if($_REQUEST['complaint-texts-edit']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaint-texts-edit.php')?>
<? } ?>

<?php if($_REQUEST['complaint-texts-add']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/complaint-texts-add.php')?>
<? } ?>

<?php if($_REQUEST['systems']) { ?>
    <h2>Системы</h2>
<? } ?>

<?php if($_REQUEST['plan']) { ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/plan-table.php')?>
<? } ?>

<?php if($_REQUEST['history']) { ?>
<h2>Анамнез</h2>
    <? } ?>
</div>
</div>

<script src="js/plugins.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/modernizr-2.6.1.min.js"></script>
<script src="js/vendor/bootstrap-alert.js"></script>
<script src="js/vendor/bootstrap-typehead.js"></script>
<script src="js/vendor/bootstrap-tooltip.js"></script>

<script src="js/main.js"></script>
<script src="js/load.js"></script>
<script src="js/datepicker.js"></script>
</body>
</html>
<?php $_SESSION['id'] = $patient_id;?>
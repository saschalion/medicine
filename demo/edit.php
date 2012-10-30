﻿﻿<?php //session_start();
include('includes/head.php'); ?>
<?php
$patient = get_patient($patient_id); $arr = edit_patient();
?>
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
            <li class="<?php if($_REQUEST['main-complaints']) echo 'active';?>">
                <a href="<?=$url?>&main-complaints=true">Жалобы основные</a>
            </li>
            <li class="<?php if($_REQUEST['system-complaints']) echo 'active';?>">
                <a href="<?=$url?>&system-complaints=true">Жалобы по системам</a>
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
                <form action="" method="post">
                    <div class="control-group">
                        <label class="control-label" for="parameter">
                            Фамилия
                        </label>
                        <div class="controls">
                            <select id="parameter" name="parameter">
                                <option value="0">Выбрать показатель</option>
                                <option value="1">Пульс</option>
                                <option value="2">Сахар</option>
                                <option value="3">Холестерин</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="value">
                            Значение
                        </label>
                        <div class="controls">
                            <input type="text" id="value" name="value">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="preparation">
                            Препарат
                        </label>
                        <div class="controls">
                            <input type="text" id="preparation" name="preparation">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date">
                            Дата
                        </label>
                        <div class="controls">
                            <input type="text" id="date" name="date" class="js-datepicker">
                        </div>
                    </div>
                    <input type="submit" name="save" class="btn" value="Сохранить">
            </form>
        <? } ?>

        <?php if($_REQUEST['main-complaints']) { ?>
            <h2>Добавить жалобы основные</h2>
        <? } ?>

        <?php if($_REQUEST['system-complaints']) { ?>
            <h2>Добавить жалобы по системам</h2>
        <? } ?>

        <?php if($_REQUEST['systems']) { ?>
            <h2>Системы</h2>
        <? } ?>

        <?php if($_REQUEST['plan']) { ?>
            <h2>План лечения</h2>
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#">2012</a>
                </li>
            </ul>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Процедуры</th>
                        <th>Январь</th>
                        <th>Февраль</th>
                        <th>Март</th>
                        <th>Апрель</th>
                        <th>Май</th>
                        <th>Июнь</th>
                        <th>Июль</th>
                        <th>Август</th>
                        <th>Сентябрь</th>
                        <th>Октябрь</th>
                        <th>Ноябрь</th>
                        <th>Декабрь</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                        if($_REQUEST['type'] && $_REQUEST['month']) {
                            print "<META HTTP-EQUIV=Refresh content=0;URL=/demo/edit.php?patient_id=".$info['id']."&plan=true>";
                        }

                        $month = array('jan', 'feb', 'mar', 'apr', 'may', 'june', 'july', 'august', 'sep', 'oct', 'nov', 'dec');

                        $types = array(
                            array('type' => 'lipids', 'name' => 'Липиды'),
                            array('type' => 'ekg', 'name' => 'ЭКГ'),
                            array('type' => 'bh', 'name' => 'Б/х'),
                            array('type' => 'end', 'name' => 'Эндокринолог')
                        );

                        $plans = array(
                            array('id' => '1', 'type' =>'bh', 'month' =>'august', 'status' => 'active'),
                            array('id' => '2', 'type' =>'ekg', 'month' =>'august', 'status' => 'active'),
                            array('id' => '3', 'type' =>'lipids', 'month' =>'mar', 'status' => 'active')
                        );

                        $arr = array();

                        foreach($plans as $n) {
                            $arr[$n['type'] . '_' . $n['month']] = $n;
                        }

                        foreach($types as $key) { ?>

                        <tr>
                            <td>
                                <?=$key['name']?>
                            </td>
                            <? for($i=0;$i < count($month); $i++) {

                            $plan_url = $url . '&plan=true&month=' . $month[$i] . '&type=' . $key['type']?>

                            <td>
                                <?php if(array_key_exists($key['type'] . '_' . $month[$i], $arr)): ?>
                                    <a class="btn btn-small btn-success js-types" href="<?=$plan_url?>"><i class="icon-ok"></i></a>
                                <? else: ?>
                                    <a class="btn btn-small js-types" href="<?=$plan_url?>"><i class="icon-ok"></i></a>
                                <? endif ?>
                            </td>

                        <?  } echo '</tr>'; } ?>
                    </tbody>
                </table>
            </div>
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
<script src="js/datepicker.js"></script>
</body>
</html>
<?php $_SESSION['id'] = $patient_id;?>
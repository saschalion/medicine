<?php require_once('functions.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/main.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>

    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
</head>
<?php include('../sms/smsc_api.php');?>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

<?php include('includes/header.php'); ?>
<div role="main">
    <div class="span12">
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Вызвать пациента</h3>
            </div>
            <div class="modal-body">
                <p>Здесь можно вызвать пациента <span class="js-set-name"></span> на приём.</p>
                <p class="fio"></p>
                <form method="post" class="send-form">
                    <input type="text" name="date" class="input-medium span2" id="datepicker" placeholder="Выбрать дату">
                    <input type="hidden" value="" class="js-set-name-post" name='fio'/>
                    <?php

                    $times = create_time_range('08:00', '18:00', '30 mins');

                    echo "<select name='time' class='input-small times'><option value='0'>время</option>";

                    for($i=0;$i<count($times); $i++) {

                        $times[$i] = date('H:i', $times[$i]);

                        $disabled_time = $disabled[$i]['time'];

                        if($disabled_time == $times[$i]) {
                            echo '<option style="color: #ccc;" value="'.array_search ($times[$i], $times).'" disabled>' . $times[$i] . '</option>';
                        }
                        else {
                            echo '<option value="'.array_search($times[$i], $times).'">' . $times[$i] . '</option>';
                        }
                    }

                    echo "</select>";

                    ?>
                    <input type="submit" value="Отправить" class="send" name='submit'/>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
                <button class="btn btn-primary" name="submit">Записать</button>
                <?php if($_POST['submit']) {

                $time = $times[$_POST['time']];

                list($sms_id, $sms_cnt, $cost, $balance) = send_sms("79032674730", 'Уважаемый ' . $_POST['fio'] . '! Ждем Вас на прием ' . $_POST['date'] . ' в '. $time . ' к эндокринологу (25 каб.)');

                    echo "<META HTTP-EQUIV=Refresh content=0;URL=/demo/index.php >";
                } ?>
            </div>
        </div>
        <?php if(!isset($_COOKIE['auth'])) { ?>
            <a href="#auth" data-toggle="modal" class="auth-link"></a>
            <div class="modal" id="auth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3>Пожалуйста, представьтесь</h3>
                </div>
                <div class="modal-body">
                    <input type="text" class="input-medium span2 auth-info" placeholder="введите Ваше имя">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary auth-button" data-dismiss="modal" type="submit">Сохранить</button>
                </div>
            </div>
        <?php } ?>

        <h2>Пациенты</h2>

        <?php $str = explode(';', $_COOKIE['messages']);

        for($i=0;$i<count($patients); $i++) { if(!in_array($patients[$i]['uid'], $str)) {

            if($patients[$i]['value'] > $patients[$i]['normal']) { ?>
            <div class="alert alert-info" id="<?=$patients[$i]['uid']?>">
                <strong class="js-name"><?=$patients[$i]['last_name'] .' '. $patients[$i]['first_name'] .' '. $patients[$i]['patronymic']?></strong> имеет <span class="label label-important"><?=$patients[$i]['parameter']?>: <?=$patients[$i]['value']?></span> за <b><?=$patients[$i]['date_param']?></b>.
                <button type="button" class="close" title="Не показывать" id="close-<?=$patients[$i]['uid']?>" data-dismiss="alert">×</button>
                <br><br>
                <button type="button" class="btn btn-success submit" data-toggle="modal" href="#myModal">Вызвать пациента</button>
            </div>
        <?php } } } ?>

        <div class="js-message"></div>

        <div class=" " style="display: none;"></div>

        <form class="form-search">
            <input type="text" class="input-medium search-query span3" id="tags" placeholder="Введите имя">
            <span class="help-inline">Возраст</span>
            <select class="span1">
                <option value="0">от</option>
                <option value="1">20</option>
                <option value="2">25</option>
                <option value="3">30</option>
                <option value="4">35</option>
                <option value="5">40</option>
                <option value="6">45</option>
                <option value="7">50</option>
                <option value="8">55</option>
                <option value="9">60</option>
                <option value="10">65</option>
                <option value="11">70</option>
                <option value="12">75</option>
                <option value="13">80</option>
            </select>
            <select class="span1">
                <option value="0">до</option>
                <option value="1">20</option>
                <option value="2">25</option>
                <option value="3">30</option>
                <option value="4">35</option>
                <option value="5">40</option>
                <option value="6">45</option>
                <option value="7">50</option>
                <option value="8">55</option>
                <option value="9">60</option>
                <option value="10">65</option>
                <option value="11">70</option>
                <option value="12">75</option>
                <option value="13">80</option>
                <option value="14">...</option>
            </select>
            <button type="submit" class="btn">Найти</button>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>
                        Фамилия
                    </th>
                    <th>
                        Имя
                    </th>
                    <th>
                        Отчество
                    </th>
                    <th>
                        Пол
                    </th>
                    <th>
                        Дата рождения
                    </th>
                    <th>
                        Заболевание
                    </th>
                    <th>
                        Действия
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($patients as $patient) { ?>
                <tr>
                    <td>
                        <?=$patient['uid']?>
                    </td>
                    <td>
                        <?=$patient['last_name']?>
                    </td>
                    <td>
                        <?=$patient['first_name']?>
                    </td>
                    <td>
                        <?=$patient['patronymic']?>
                    </td>
                    <td>
                        <?=$patient['sex']?>
                    </td>
                    <td>
                        <?=$patient['date_birthday']?>
                    </td>
                    <td>
                        <?=$patient['disease']?>
                    </td>
                    <td>
                        <a href="show.php?patient_id=<?=$patient['uid']?>" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination pagination-centered">
            <ul>
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="js/plugins.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/modernizr-2.6.1.min.js"></script>
<script src="js/vendor/bootstrap-alert.js"></script>
<script src="js/vendor/bootstrap-typehead.js"></script>
<script src="js/main.js"></script>
</body>
</html>

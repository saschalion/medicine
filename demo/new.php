<?php include('includes/head.php'); ?>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

<?php include('includes/header.php'); ?>

<div role="main">
    <?php include('includes/login.php'); ?>

    <div class="span12">
        <h2>Добавить пациента</h2>
        <?php

        if($submit) {
            if(empty($last_name) || empty($first_name) || empty($patronymic)) {
                $message = '<span style="color: #ff0000">Поля не должны быть пустыми!</span>';

                $fields = array($last_name, $first_name, $patronymic, $sex, $document, $address, $phone, $mobile_phone, $mobile_phone_second, $desease);
            }
            else {
                send_sql();

                $result = mysql_insert_id();
;
                echo "<META HTTP-EQUIV=Refresh content=0;URL=/demo/show.php?patient_id=$result>";
            }
        }
        ?>
        <form action="new.php" method="post">
            <p>
                <?=$message?>
            </p>
            <div class="control-group">
                <label class="control-label" for="last_name">
                    Фамилия
                </label>
                <div class="controls">
                    <input type="text" id="last_name" name="last_name" value="<?=$fields[0]?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="first_name">
                    Имя
                </label>
                <div class="controls">
                    <input type="text" id="first_name" name="first_name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="patronymic">
                    Отчество
                </label>
                <div class="controls">
                    <input type="text" id="patronymic" name="patronymic">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="sex">
                    Пол
                </label>
                <div class="controls">
                    <input type="text" id="sex" name="sex">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="document">
                    Паспортные данные
                </label>
                <div class="controls">
                    <input type="text" id="document" name="document">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="address">
                    Адрес
                </label>
                <div class="controls">
                    <input type="text" id="address" name="address">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="phone">
                    Телефон
                </label>
                <div class="controls">
                    <input type="text" id="phone" name="phone">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mobile_phone">
                    Мобильный телефон
                </label>
                <div class="controls">
                    <input type="text" id="mobile_phone" name="mobile_phone">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mobile_phone_second">
                    Мобильный телефон 2
                </label>
                <div class="controls">
                    <input type="text" id="mobile_phone_second" name="mobile_phone_second">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="desease">
                    Болезнь
                </label>
                <div class="controls">
                    <input type="text" id="desease" name="desease">
                </div>
            </div>
            <input type="submit" name="submit" class="btn" value="Сохранить">
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
</body>
</html>
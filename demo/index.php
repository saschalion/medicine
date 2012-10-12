<?php if($_GET['logout']) {
    setcookie('messages', '', 0, "/");
    header('Location: index.php');
}?>
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
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">МедОКБ</a>
            <div class="nav-collapse collapse" style="height: 0px; ">
                <p class="navbar-text pull-right">
                    Вы зашли как <a href="#" class="navbar-link">Светлана Сергеевна</a>
                </p>
                <ul class="nav">
                    <li class="active">
                        <a href="#">Пациенты</a>
                    </li>
                    <li><a href="#">Документы</a></li>
                    <li><a href="#">Услуги</a></li>
                    <li><a href="?logout=true">Выход</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div role="main">
    <div class="span12">

        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Вызвать пациента</h3>
            </div>
            <div class="modal-body">
                <p>Здесь можно вызвать пациента на приём.</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
                <button class="btn btn-primary">Записать</button>
            </div>
        </div>

        <h2>Пациенты</h2>
<!--        --><?php //foreach ($_COOKIE as $cookie_name => $cookie_value) {
//            print "$cookie_name = $cookie_value<br>";
//        } ?>

        <?php if (!isset($_COOKIE['messages'])) { ?>
            <div class="alert alert-info">
                <strong>Иванов Иван Алексеевич</strong> имеет холестерин: <b>50</b> за <b>18/10/2012</b>.
                <button type="button" class="btn btn-success" data-toggle="modal" href="#myModal">Вызвать пациента</button><br>
                <button type="button" class="btn" data-dismiss="alert">Ок</button>
                <button type="button" class="close" title="Не показывать" id="close-1" data-dismiss="alert">×</button>
            </div>
            <div class="alert alert-info">
                <strong>Берсеньев Аркадий Иванович</strong> имеет пульс: <b>120</b> за <b>20/06/2012</b>.
                <button type="button" class="btn btn-success">Вызвать пациента</button><br>
                <button type="button" class="btn" data-dismiss="alert">Ок</button>
                <button type="button" class="close" title="Не показывать" id="close-2" data-dismiss="alert">×</button>
            </div>
        <?php } ?>

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
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Иванов
                    </td>
                    <td>
                        Иван
                    </td>
                    <td>
                        Алексеевич
                    </td>
                    <td>
                        М
                    </td>
                    <td>
                        29.06.1987
                    </td>
                    <td>
                        Грипп
                    </td>
                    <td>
                        <a href="show.php" class="btn btn-info">
                            <i class="icon-eye-open"></i>
                            Просмотр
                        </a>
                    </td>
                </tr>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<script src="js/plugins.js"></script>


<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/modernizr-2.6.1.min.js"></script>

<script src="js/main.js"></script>

</body>
</html>

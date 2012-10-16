<?php require_once('functions.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Личная карточка - Иванов Иван Алексеевич (03.05.1987 - 25 лет)</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/main.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    <link href="css/main.css" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

<?php include('includes/header.php')?>
<div role="main">
        <div class="span3 bs-docs-sidebar">
            <div class="affix">
                <ul class="nav nav-list bs-docs-sidenav">
                    <li class="active"><a href="#overview"><i class="icon-chevron-right"></i> Общая информация</a></li>
                    <li><a href="#transitions"><i class="icon-chevron-right"></i> Общий анамнез</a></li>
                    <li><a href="#dropdowns"><i class="icon-chevron-right"></i> Наблюдения и анализы</a></li>
                    <li><a href="#systems"><i class="icon-chevron-right"></i> Системы</a></li>
                    <li><a href="#modals"><i class="icon-chevron-right"></i> Запись</a></li>
                </ul>
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                        <li class="nav-header">Жалобы</li>
                        <li><a href="#">болевые ощущения</a></li>
                        <li><a href="#">гнойное отделяемое</a></li>
                        <li><a href="#">для контрольного осмотра</a></li>
                        <li><a href="#">для осмотра глазного дна</a></li>
                        <li><a href="#">светобоязнь</a></li>
                        <li><a href="#">светотечение</a></li>
                        <li><a href="#">жжение</a></li>
                        <li><a href="#">для подбора очков</a></li>
                        <li><a href="#">жалобы на усталость зрения</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="span9">
            <section id="overview">
                <?php for($i = 0; $i <= 1; $i++) {
                    if($patients[$i]['uid'] == $patient_id) { ?>
                    <h2>Личная карточка - <?=$patients[$i]['last_name']?> Иван Алексеевич (03.05.1987 - 25 лет)</h2>
                <? }} ?>
                <p>
                    <strong>Фамилия, имя, отчество:</strong> Иванов Иван Алексеевич.
                </p>
                <p>
                    <strong>Дата рождения:</strong> 03.05.1987.
                </p>
                <p>
                    <strong>Возраст:</strong> 25.
                </p>
                <p>
                    <strong>Домашний адрес:</strong> 115407, г. Москва, Нагатинская наб., д. 44 к. 3 кв. 108.
                </p>
                <p>
                    <strong>Домашний телефон:</strong> +7 (499) 616-75-84.
                </p>
                <p>
                    <strong>Мобильный телефон:</strong> +7 (903) 267-47-30.
                </p>
                <p>
                    <strong>Обслуживающая поликлиника:</strong> №127.
                </p>
                <p>
                    Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.

                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.

                    Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                </p>
                <p>
                    Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.

                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.

                    Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                </p>
                <p>
                    Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.

                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.

                    Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                </p>
            </section>
            <section id="transitions">
                <h2>Общий анамнез</h2>
                <h4>
                    <i class="icon-book"></i>
                    Анамнез жизни пациента
                </h4>
                <h5>
                    Развитие
                </h5>
                <p>
                    Росла и развивалась нормально.
                </p>
                <h5>
                    Условия жизни и работы
                </h5>
                <p>
                    Условия жизни: жилищно-бытовые условия удовлетворительные. Профессия: продавец. Условия работы: нервная перегрузка
                </p>
                <h5>
                    Курение
                </h5>
                <p>
                    Стаж: 10 лет.
                </p>
                <h5>
                    Прочие вредные привычки
                </h5>
                <p>
                    Отрицает.
                </p>
            </section>
            <section id="dropdowns">
                <h2>Наблюдения и анализы</h2>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <i class="icon-plus-sign accordion-icon"></i>
                                среда 11 марта 2009 11:25
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <h4>
                                    <i class="icon-book"></i>
                                    История заболевания
                                </h4>
                                <h5>
                                    Жалобы
                                </h5>
                                <p>
                                    жалобы на усталость зрения
                                </p>

                                <h4>
                                    <i class="icon-book"></i>
                                    Осмотр офтальмолога
                                </h4>
                                <h5>
                                    OD
                                </h5>
                                <p>
                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.
                                    Роговица: прозрачная, влажная, сферичная.
                                </p>

                                <h5>
                                    OS
                                </h5>
                                <p>
                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.
                                </p>

                                <h4>
                                    <i class="icon-filter"></i>
                                    Анализы
                                </h4>
                                <h5>Измерение пульса</h5>
                                <p>
                                    <a href="/charts/chart.php?pulse-advanced=true" class="btn btn-success">
                                        Просмотр графика
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                <i class="icon-plus-sign accordion-icon"></i>
                                четверг 12 марта 2011 10:25
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h4>
                                    <i class="icon-book"></i>
                                    История заболевания
                                </h4>
                                <h5>
                                    Жалобы
                                </h5>
                                <p>
                                    жалобы на усталость зрения
                                </p>

                                <h4>
                                    <i class="icon-book"></i>
                                    Осмотр офтальмолога
                                </h4>
                                <h5>
                                    OD
                                </h5>
                                <p>
                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.
                                    Роговица: прозрачная, влажная, сферичная.
                                </p>

                                <h5>
                                    OS
                                </h5>
                                <p>
                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.
                                </p>

                                <h4>
                                    <i class="icon-filter"></i>
                                    Анализы
                                </h4>
                                <h5>Измерение пульса</h5>
                                <p>
                                    <a href="/charts/chart.php?pulse-advanced=true" class="btn btn-success">
                                        Просмотр графика
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                <i class="icon-plus-sign accordion-icon"></i>
                                среда 12 марта 2012 10:40
                            </a>
                        </div>
                        <div id="collapse3" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h4>
                                    <i class="icon-book"></i>
                                    История заболевания
                                </h4>
                                <h5>
                                    Жалобы
                                </h5>
                                <p>
                                    жалобы на усталость зрения
                                </p>

                                <h4>
                                    <i class="icon-book"></i>
                                    Осмотр офтальмолога
                                </h4>
                                <h5>
                                    OD
                                </h5>
                                <p>
                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.
                                    Роговица: прозрачная, влажная, сферичная.
                                </p>

                                <h5>
                                    OS
                                </h5>
                                <p>
                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.
                                </p>

                                <h4>
                                    <i class="icon-filter"></i>
                                    Анализы
                                </h4>
                                <h5>Измерение пульса</h5>
                                <p>
                                    <a href="/charts/chart.php?pulse-advanced=true" class="btn btn-success">
                                        Просмотр графика
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="systems">

                <h2>Системы</h2>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active">
                        <a href="#circulatory" data-toggle="tab">
                            Сердечно-сосудистая
                        </a>
                    </li>
                    <li>
                        <a href="#respiratory" data-toggle="tab">
                            Органы дыхания
                        </a>
                    </li>
                    <li>
                        <a href="#digestion" data-toggle="tab">
                            Органы пищеварения
                        </a>
                    </li>
                    <li>
                        <a href="#urine" data-toggle="tab">
                            Моче-выделительная
                        </a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="circulatory">
                        <h5>Область сердца</h5>
                        <p>
                            Визуально не изменена.
                        </p>
                        <h5>Перкуссия сердца</h5>
                        <p>
                            Границы сердца не расширены.
                        </p>
                        <h5>Аускультация сердца</h5>
                        <p>
                            Тоны сердца ритмические, звучные.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="respiratory">
                        <h5>Аускультация легких</h5>
                        <p>
                            Дыхание в легких везикулярное, хрипов нет.
                        </p>
                        <h5>Перкуссия легких</h5>
                        <p>
                            Звук ясный, легочный.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="digestion">
                        <h5>Полость рта</h5>
                        <p>
                            Язык чистый, влажный.
                        </p>
                        <h5>Пальпация ЖКТ</h5>
                        <p>
                            Живот мягкий, безболезненный. Печень, селезенка и лимфоузлы не увеличены.
                        </p>
                        <h5>Перкуссия ЖКТ</h5>
                        <p>
                            Без паталогии.
                        </p>
                        <h5>Стул</h5>
                        <p>
                            В норме.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="urine">
                        <h5>Пальпация</h5>
                        <p>
                            Мочевой пузырь пальпируется. Почти пальпируются в положении лежа.
                        </p>
                        <h5>Симптом поколачивания</h5>
                        <p>
                            Текст текст текст.
                        </p>
                        <h5>Мочеиспускание</h5>
                        <p>
                            В норме.
                        </p>
                    </div>
                </div>
            </section>
            <section id="modals">
                <h2>Запись</h2>
                <p>
                    <a href="#" class="btn btn-success">
                        Пригласить на приём
                    </a>
                </p>
            </section>
        </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>


<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/modernizr-2.6.1.min.js"></script>
<script src="js/vendor/bootstrap-scrollspy.js"></script>
<script src="js/vendor/bootstrap-collapse.js"></script>

<script src="js/main.js"></script>
</body>
</html>

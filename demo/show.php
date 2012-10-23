<?php include('includes/head.php'); ?>
<?php $patient = get_patient(); $types = get_parameter_type($patient_id);?>
<?php include('includes/header.php')?>
<?php include('includes/call.php'); ?>
<div role="main" xmlns="http://www.w3.org/1999/html">
    <aside class="sidebar sidebar_type_left affix">
        <h2>Явки</h2>
        <div class="sidebar__inner">
            <?php include('includes/notifications.php'); ?>
        </div>
    </aside>
    <div class="main">
        <div class="main__inner">

            <?php foreach($patient as $info) { ?>

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/includes/breadcrumbs.php')?>

            <section id="overview">
                <h2>Личная карточка &mdash;
                    <?=$info['last_name'] .' '. $info['first_name'] .' '. $info['patronymic'] .
                        ' (' . get_date_birth($info['date_birth']) . ' - ' .  get_age($info['date_birth']) . ')'?>
                </h2>
                <div class="clearfix">
                    <a style="float: right;" title="Редактировать" href="edit.php?patient_id=<?=$info['id']?>&main=true" class="btn btn-info">
                        <i class="icon-pencil"></i> Редактировать
                    </a>
                    <br><br>
                </div>

                <?php $this_url = "/demo/show.php?patient_id=$info[id]"; ?>

                <?php
                if(!$_REQUEST['type'] && $_REQUEST['main'] && $types) {
                        $types = get_types($patient_id);
                        echo "<META HTTP-EQUIV=Refresh content=0;URL=/demo/show.php?patient_id=".$patient_id."&type=".$types[0]['code']."&main=true>";
                    }
                ?>

                <div class="navbar clearfix">
                    <div class="navbar-inner">
                        <a class="brand">Пациент</a>
                        <ul class="nav">
                            <li class="<?php if($_REQUEST['main']) echo 'active'?>">
                                <a href="<?=$this_url?>&type=sugar&main=true">Показатели</a>
                            </li>
                            <li class="<?php if($_REQUEST['info']) echo 'active'?>">
                                <a href="<?=$this_url?>&info=true">
                                    Паспортные данные
                                </a>
                            </li>
                            <li><a href="#">Жалобы основные</a></li>
                            <li><a href="#">Жалобы по системам</a></li>
                            <li class="<?php if($_REQUEST['systems']) echo 'active'?>">
                                <a href="<?=$this_url?>&systems=true">
                                    Системы
                                </a>
                            </li>
                            <li class="<?php if($_REQUEST['plan']) echo 'active'?>">
                                <a href="<?=$this_url?>&plan=true">
                                    План лечения
                                </a>
                            </li>
                            <li class="<?php if($_REQUEST['history']) echo 'active'?>">
                                <a href="<?=$this_url?>&history=true">
                                    Анамнез
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <?php if($_REQUEST['main']) { ?>
                    <ul class="nav nav-tabs">
                        <?php if($types) foreach($types as $param) {  ?>
                                <?php if($_REQUEST['type'] == $param['code']) {  ?>
                                    <li class="active">
                                        <a href="#"><?=$param['name']?></a>
                                    </li>
                                <? } else { ?>
                                    <li><a href="<?=$this_url?>&type=<?=$param['code']?>&main=true">
                                        <?=$param['name']?></a>
                                    </li>
                                <? } ?>
                        <?php } ?>
                    </ul>
                    <?php if(set_chart($patient_id, $type)) { ?>
                        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                    <?php } else { ?>
                    <p>Нет данных для графика</p>
                    <a href="edit.php?patient_id=<?=$info['id']?>&parameters=true" class="btn btn-success">
                        <i class="icon-plus-sign"></i> Добавить
                    </a>
                <? }} ?>

                <?php if($_REQUEST['info']) { ?>
                    <p>
                        <strong>Фамилия, имя, отчество:</strong>
                        <?=$info['last_name'] .' '. $info['first_name'] .' '. $info['patronymic']?>.
                    </p>
                    <p>
                        <strong>Дата рождения:</strong> <?=get_date_birth($info['date_birth'])?>.
                    </p>
                    <p>
                        <strong>Возраст:</strong> <?=get_age($info['date_birth'])?>.
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
                <? } ?>

                <?php if($_REQUEST['plan']) { ?>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/plan.php'); ?>
                <? } ?>
            </section>

            <?php if($_REQUEST['systems']) { ?>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/systems.php'); ?>
            <? } ?>

            <?php if($_REQUEST['history']) { ?>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/patient/history.php'); ?>
            <? } ?>

            <?php } ?>

<!--            <section id="dropdowns">-->
<!--                <h2>Наблюдения и анализы</h2>-->
<!--                <div class="accordion" id="accordion2">-->
<!--                    <div class="accordion-group">-->
<!--                        <div class="accordion-heading">-->
<!--                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">-->
<!--                                <i class="icon-plus-sign accordion-icon"></i>-->
<!--                                среда 11 марта 2009 11:25-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div id="collapseOne" class="accordion-body collapse in">-->
<!--                            <div class="accordion-inner">-->
<!--                                <h4>-->
<!--                                    <i class="icon-book"></i>-->
<!--                                    История заболевания-->
<!--                                </h4>-->
<!--                                <h5>-->
<!--                                    Жалобы-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    жалобы на усталость зрения-->
<!--                                </p>-->
<!---->
<!--                                <h4>-->
<!--                                    <i class="icon-book"></i>-->
<!--                                    Осмотр офтальмолога-->
<!--                                </h4>-->
<!--                                <h5>-->
<!--                                    OD-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.-->
<!--                                    Роговица: прозрачная, влажная, сферичная.-->
<!--                                </p>-->
<!---->
<!--                                <h5>-->
<!--                                    OS-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.-->
<!--                                </p>-->
<!---->
<!--                                <h4>-->
<!--                                    <i class="icon-filter"></i>-->
<!--                                    Анализы-->
<!--                                </h4>-->
<!--                                <h5>Измерение пульса</h5>-->
<!--                                <p>-->
<!--                                    <a href="/charts/chart.php?pulse=true" class="btn btn-success">-->
<!--                                        Просмотр графика-->
<!--                                    </a>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="accordion-group">-->
<!--                        <div class="accordion-heading">-->
<!--                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">-->
<!--                                <i class="icon-plus-sign accordion-icon"></i>-->
<!--                                четверг 12 марта 2011 10:25-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div id="collapseTwo" class="accordion-body collapse">-->
<!--                            <div class="accordion-inner">-->
<!--                                <h4>-->
<!--                                    <i class="icon-book"></i>-->
<!--                                    История заболевания-->
<!--                                </h4>-->
<!--                                <h5>-->
<!--                                    Жалобы-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    жалобы на усталость зрения-->
<!--                                </p>-->
<!---->
<!--                                <h4>-->
<!--                                    <i class="icon-book"></i>-->
<!--                                    Осмотр офтальмолога-->
<!--                                </h4>-->
<!--                                <h5>-->
<!--                                    OD-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.-->
<!--                                    Роговица: прозрачная, влажная, сферичная.-->
<!--                                </p>-->
<!---->
<!--                                <h5>-->
<!--                                    OS-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.-->
<!--                                </p>-->
<!---->
<!--                                <h4>-->
<!--                                    <i class="icon-filter"></i>-->
<!--                                    Анализы-->
<!--                                </h4>-->
<!--                                <h5>Измерение пульса</h5>-->
<!---->
<!--                                <p>-->
<!--                                    <a href="/charts/chart.php?pulse=true" class="btn btn-success">-->
<!--                                        Просмотр графика-->
<!--                                    </a>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="accordion-group">-->
<!--                        <div class="accordion-heading">-->
<!--                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">-->
<!--                                <i class="icon-plus-sign accordion-icon"></i>-->
<!--                                среда 12 марта 2012 10:40-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div id="collapse3" class="accordion-body collapse">-->
<!--                            <div class="accordion-inner">-->
<!--                                <h4>-->
<!--                                    <i class="icon-book"></i>-->
<!--                                    История заболевания-->
<!--                                </h4>-->
<!--                                <h5>-->
<!--                                    Жалобы-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    жалобы на усталость зрения-->
<!--                                </p>-->
<!---->
<!--                                <h4>-->
<!--                                    <i class="icon-book"></i>-->
<!--                                    Осмотр офтальмолога-->
<!--                                </h4>-->
<!--                                <h5>-->
<!--                                    OD-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.-->
<!--                                    Роговица: прозрачная, влажная, сферичная.-->
<!--                                </p>-->
<!---->
<!--                                <h5>-->
<!--                                    OS-->
<!--                                </h5>-->
<!--                                <p>-->
<!--                                    Веки без изменений. Слезные органы: в норме. Конъюнктива: спокойна. Перикормеальная им: отсутствует.-->
<!--                                </p>-->
<!---->
<!--                                <h4>-->
<!--                                    <i class="icon-filter"></i>-->
<!--                                    Анализы-->
<!--                                </h4>-->
<!--                                <h5>Измерение пульса</h5>-->
<!--                                <p>-->
<!--                                    <a href="/charts/chart.php?pulse=true" class="btn btn-success">-->
<!--                                        Просмотр графика-->
<!--                                    </a>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>-->

<!--            <section id="modals">-->
<!--                <h2>Запись</h2>-->
<!--                <p>-->
<!--                    <a href="#" class="btn btn-success">-->
<!--                        Пригласить на приём-->
<!--                    </a>-->
<!--                </p>-->
<!--            </section>-->
        </div>
    </div>
    <?php include('includes/r-sidebar.php'); ?>
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

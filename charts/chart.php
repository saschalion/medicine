<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Параметры пульса</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<!--    --><?php //if($_GET['pulse']) { ?>
<!--        <script src="js/highcharts.js"></script>-->
<!--        <script src="js/highcharts-more.js"></script>-->
<!--        <script src="js/exporting.js"></script>-->
<!--        <script src="js/reports.js"></script>-->
<!--        <script src="js/speed.js"></script>-->
<!--    --><?php //} ?>

    <?php if($_GET['pulse']) { ?>
        <script src="js/highstock.js"></script>
        <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>
        <script src="js/stock.js"></script>
        <style>
            .highcharts-range-selector:last-child {
                margin-right: 150px !important;
            }
        </style>

    <?php } ?>
</head>
<body>
    <?php if($_GET['pulse']) {
        echo '<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>';
    } ?>
</body>
</html>
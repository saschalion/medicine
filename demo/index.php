<?php include('includes/head.php'); ?>

<?php include('includes/header.php'); ?>

<div role="main">
    <?php include('includes/call.php'); ?>
    <?php include('includes/login.php'); ?>
    <aside class="sidebar sidebar_type_left affix">
        <h2>Явки</h2>
        <div class="sidebar__inner">
            <?php include('includes/notifications.php'); ?>
        </div>
    </aside>
    <div class="main">
        <div class="main__inner">
            <h2>Пациенты</h2>
            <?php include('includes/search.php'); ?>
            <?php include('includes/patients.php'); ?>
        </div>
    </div>
    <aside class="sidebar sidebar_type_right affix">
        <h2>Диспансер</h2>
        <div class="sidebar__inner">
            <?php include('includes/notifications.php'); ?>
        </div>
    </aside>
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

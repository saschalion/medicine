<?php include('includes/head.php'); ?>

<?php include('includes/header.php'); ?>

<div role="main">

    <?php include('includes/l-sidebar.php'); ?>

    <div class="main">
        <div class="main__inner">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/demo/includes/breadcrumbs.php')?>
            <h2>План лечения</h2>
            <?php include('includes/search.php'); ?>
            <?php include('includes/plan.php'); ?>
        </div>
    </div>

    <?php include('includes/r-sidebar.php'); ?>
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

<?php
    require_once "src/includes.php";
    $menu = 'index'
?>

<html>
<?php include "templates/head.php";?>
<body class="Start Here">
<div id="page-wrapper">

    <?php include "templates/header.php"; ?>

    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <?php include "templates/descriere.php" ?>
        <?php include "templates/cursuri.php" ?>
        <?php include "templates/postari.php" ?>
    </div>

    <?php include "templates/footer.php"; ?>
    <?php include "templates/scripts.php"; ?>

</body>
</html>
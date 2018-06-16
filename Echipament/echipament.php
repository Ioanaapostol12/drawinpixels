<?php
include '../src/includes.php';
$menu = 'echipament';
?>
<html>
<?php include "../templates/head.php"?>
<body class="Coursses">
<div id="page-wrapper">

    <?php include '../templates/header.php'?>

    <div id="main-wrapper">
    <?php include '../echipament/postariechipament.php'?>
    <?php include '../echipament/obiective.php'?>
    <?php include "../templates/postari.php"; ?>
</div>


        <?php include "../templates/footer.php"; ?>
        <?php include "../templates/scripts.php"; ?>


    </body>
    </html>
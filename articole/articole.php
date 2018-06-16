<?php include '../src/includes.php';
$menu = 'articole'
?>
<html>
<?php include '../templates/head.php'; ?>
<body class="Articles">
<div id="page-wrapper">

    <!-- Header Wrapper -->
<?php include '../templates/header.php';?>

    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <?php include '../articole/continutarticol.php';?>
        </div>
        <?php include '../templates/postari.php';?>
    </div>



<?php include '../templates/footer.php'; ?>
<?php include '../templates/scripts.php'; ?>

</body>
</html>
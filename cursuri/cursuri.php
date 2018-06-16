<?php include '../src/includes.php';
$menu = 'cursuri';

if(!isLoggedIn()){
    header("Location: /user/login.php");
    die();
}

if(isset($_GET['curs']) && $_GET['curs'] != ''){
    $course = $courseRepository->findOneBySlug($_GET['curs']);
    if(!$course){
        header("Location: /cursuri/index.php");
        die();
    }
}else{
    header("Location: /cursuri/index.php");
    die();
}

?>
<html>
<?php include '../templates/head.php'; ?>
<body class="Coursses">
<div id="page-wrapper">

    <!-- Header Wrapper -->
    <?php include '../templates/header.php'; ?>

    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="wrapper style2">
            <div class="inner">
                <div class="container">
                    <div id="content">

                        <!-- Content -->

                        <article>
                            <header class="major">
                                <h2><?php echo $course->getName() ?></h2>
                                <p><?php echo $course->getShortDescription() ?></p>
                            </header>

                            <?php echo html_entity_decode($course->getContent()) ?>
                    </div>
                </div>
            </div>
    </div>


    <?php include '../templates/postari.php'; ?>
</div>

<?php include '../templates/footer.php'; ?>
<?php include '../templates/scripts.php'; ?>
</body>
</html>
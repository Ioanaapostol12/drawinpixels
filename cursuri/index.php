<?php
include '../src/includes.php';

if(!isLoggedIn()){
    header("Location: /user/login.php");
}


$menu = 'cursuri'
?>
<html>
<?php include "../templates/head.php"?>
<body class="Coursses">
<div id="page-wrapper">

    <?php include '../templates/header.php'?>


    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="wrapper style3">
            <div class="inner">
                <?php
                if(isLoggedIn())
                {
                ?>
                <!-- Feature 2 -->
                <section class="container box feature2">
                    <div class="row">

                        <?php
                        /** @var Course $course */
                        foreach ($courseRepository->findAll() as $course) {
                            ?>

                            <div class="6u 12u(mobile)">
                                <section>
                                    <header class="major">
                                        <h2><?php echo $course->getName() ?></h2>\
                                    </header>
                                    <p><?php echo $course->getShortDescription()?></p>
                                    <footer>
                                        <a href='../cursuri/expunere.php' class="button medium icon fa-arrow-circle-right">Descopera mai mult</a>
                                    </footer>
                                </section>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                </section>
                <?php } ?>
                <div class="container">
                    <div class="row">
                        <div class="8u 12u(mobile)">

                            <!-- Article list -->
                            <section class="box article-list">
                                <h2 class="icon fa-file-text-o">Postari recente</h2>

                                <!-- Excerpt -->
                                <article class="box excerpt">
                                    <a href="#" class="image left"><img src="/assets/images/pic04.jpg" alt="" /></a>
                                    <div>
                                        <header>
                                            <span class="date">March 24</span>
                                            <h3><a href="#">Fotografia de peisaj</a></h3>
                                        </header>
                                        <p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus
                                            semper mod quisturpis nisi consequat etiam lorem. Phasellus quam turpis,
                                            feugiat et sit amet ornare in, hendrerit in lectus semper mod quis eget mi dolore.</p>
                                    </div>
                                </article>

                            </section>
                        </div>
                        <div class="4u 12u(mobile)">

                            <!-- Spotlight -->
                            <section class="box spotlight">
                                <h2 class="icon fa-file-text-o">Articol</h2>
                                <article>
                                    <a href="#" class="image featured"><img src="/assets/images/pic07.jpg" alt=""></a>
                                    <header>
                                        <h3><a href="#">Era noastra, digitala</a></h3>
                                        <p>Exteriorizarea emotiilor prin imagini</p>
                                    </header>
                                    <p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus semper mod
                                        quisturpis nisi consequat ornare in, hendrerit in lectus semper mod quis eget mi quat etiam
                                        lorem. Phasellus quam turpis, feugiat sed et lorem ipsum dolor consequat dolor feugiat sed
                                        et tempus consequat etiam.</p>
                                    <p>Lorem ipsum dolor quam turpis, feugiat sit amet ornare in, hendrerit in lectus semper
                                        mod quisturpis nisi consequat etiam lorem sed amet quam turpis.</p>
                                    <footer>
                                        <a href="#" class="button alt icon fa-file-o">Citeste continuarea</a>
                                    </footer>
                                </article>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../templates/footer.php"; ?>
    <?php include "../templates/scripts.php"; ?>

</body>
</html>
<?php
if (!isset($menu) || $menu == ''){
    $menu = 'index';
}
?>

<!-- Header -->
<div id="header-wrapper">
    <div class="container">
        <!-- Header -->
        <header id="header">
            <div class="inner">

                <!-- Logo -->
                <h1><a href="/" id="logo">Draw in pixels</a></h1>

                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li <?php echo ($menu == 'index')? 'class="current_page_item"':'' ?>><a href="/">Start </a></li>
                        <li <?php echo ($menu == 'cursuri')? 'class="current_page_item"':'' ?>>
                            <a href='/cursuri/index.php'>Cursuri</a>
                            <ul>
                                <li><a href="/cursuri/expunere.php">Expunerea corecta</a></li>

                                <li><a href="/cursuri/compozitie.php">Reguli de compozitie</a></li>

                            </ul>
                        </li>
                        <li <?php echo ($menu == 'echipamente')? 'class="current_page_item"':'' ?>><a href='/Echipament/echipament.php'>Echipament</a></li>
                        <li><a href='/articole/articole.php'>Articole</a></li>
                        <li><a href='/tipsandtricks/tipsandtricks.php'>Tips & Tricks</a></li>
                    </ul>
                </nav>

            </div>
        </header>
        <?php
        if($menu == 'index' || $menu == 'cursuri'){
        ?>
        <!-- Banner -->
        <div id="banner">

            <h2><strong>Draw in Pixels:</strong> Invata sa te joci cu pixeli in imagini de neuitat
                <br/>

                <br/>
                <a href="#">Pixel - pas cu pas</a></h2>

            <?php
            if (!isLoggedIn()){
                ?>
                <a href="/user/login.php" class="button big icon fa-check-circle">Log in</a>
                <a href="/user/register.php" class="button big icon fa-check-circle">Sign up</a>
            <?php

            }else{
                ?>
                <a href="/user/logout.php" class="button big icon fa-check-circle">Log out</a>
            <?php
            }

            ?>


        </div>
        <?php } ?>

    </div>
</div>
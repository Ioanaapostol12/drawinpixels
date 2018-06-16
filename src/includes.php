<?php
session_start();

define ('__BASEDIR__', realpath(__DIR__."/../"), true);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function isLoggedIn(){
    return (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')?$_SESSION['user_id']:null;
}
function logOut(){
    session_destroy();
}

require_once __BASEDIR__."/src/custom_scripts.php";
require_once  __BASEDIR__."/config/database.php";
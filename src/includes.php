<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function isLoggedIn(){
    return (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')?$_SESSION['user_id']:null;
}
function logOut(){
    session_destroy();
}

require_once __DIR__."/custom_scripts.php";
require_once  realpath(__DIR__."/../config/database.php");
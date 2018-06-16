<?php
include "../../src/includes.php";

$currentUser = $userRepository->findOneById(isLoggedIn());

if(!$currentUser || !$currentUser->isAdmin())
{
    header("Location: /user/login.php");
    die();
}

if(isset($_GET['id']) && $_GET['id'] != ''){
    $response = $database->delete('courses',['id' => $_GET['id']]);
    if($response){
        header("Location: /admin/content/cursuri.php");
        die();
    }else{
        var_dump($response);
    }
}
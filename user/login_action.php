<?php
require_once "../src/includes.php";

/**
 * @var ../src/class/database/Database $database
 */
$database;

$userData['email'] = (isset($_POST['email']))?$_POST['email']:null;
$userData['password'] = (isset($_POST['password']))?$_POST['password']:null;


$response = [
    'success' => true,
    'userData' => $userData,
    'error' => []
];

if(!$userData['email'] || !$userData['email'] != ''){
    $response['success'] = false;
    $response['error'][] = 'Nu ai setat email';
}
if(!$userData['password'] || !$userData['password'] != ''){
    $response['success'] = false;
    $response['error'][] = 'Nu ai setat parola';
}

if($response['success']){
    $query = "SELECT `id` FROM `users` WHERE `email` = '".$userData['email']."' and `password` = '".$userData['password']."'";
    $userId = $database->get_row($query);

    if(reset($userId)){
        header("Location: /cursuri");

        unset($_SESSION['response']);
        $_SESSION['user_id'] = reset($userId);
        die();
    }else{
        $_SESSION['response'] = $response;
        header("Location: /user/login.php");
        die();
    }

}

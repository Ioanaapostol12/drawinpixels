<?php
require_once "../src/includes.php";

/**
 * @var ../src/class/database/Database $database
 */
$database;

$userData['email'] = (isset($_POST['email']))?$_POST['email']:null;
$userData['username'] = (isset($_POST['username']))?$_POST['username']:null;
$userData['password'] = (isset($_POST['password']))?$_POST['password']:null;
$userData['check_password'] = (isset($_POST['check_password']))?$_POST['check_password']:null;

$response = [
    'success' => true,
    'userData' => $userData,
    'error' => []
];

if($userData['email'] && $userData['email'] != ''){
    $query = "SELECT id FROM `users` WHERE `email` = '".$userData['email']."'";
    $users = $database->get_row($query);
    if($users){
        $response['success'] = false;
        $response['error'][] = 'Acest email exista deja';
    }
}else{
    $response['success'] = false;
    $response['error'][] = 'Va rugam introduceti un email';
}

if($userData['username'] && $userData['username'] != ''){
    $query = "SELECT id FROM `users` WHERE `username` = '".$userData['username']."'";
    $users = $database->get_row($query);
    if($users){
        $response['success'] = false;
        $response['error'][] = 'Acest nume de utilizator este folosit deja';
    }
}else{
    $response['success'] = false;
    $response['error'][] = 'Va rugam introduceti un nume de utilizator';
}
if(
    ($userData['password'] && $userData['password'] != '') &&
    ($userData['check_password'] && $userData['check_password'] != '')
){
    if($userData['password'] != $userData['check_password']){
        $response['success'] = false;
        $response['error'][] = 'Parola nu coincide';
    }
}else{
    $response['success'] = false;
    $response['error'][] = 'Va rugam introduceti parola';
}

if($response['success']){
    $response = $database->insert('users',[
        'email' => $userData['email'],
        'username' => $userData['username'],
        'password' => $userData['password'],
    ]);
    if(!$response){
        $response['success'] = false;
        $response['error'] = "Eroare sql!";
        var_dump($response);
    }else{
        unset($_SESSION['response']);
        header("Location: /cursuri/");
        die();

    }
}
$_SESSION['response'] = $response;
header("Location: /user/register.php");
die();

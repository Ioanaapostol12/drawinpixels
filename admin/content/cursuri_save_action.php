<?php
include "../../src/includes.php";

$currentUser = $userRepository->findOneById(isLoggedIn());

if(!$currentUser || !$currentUser->isAdmin())
{
    header("Location: /user/login.php");
    die();
}

$courseData['id'] = (isset($_POST['id']))?$_POST['id']:null;
$courseData['name'] = (isset($_POST['name']))?$_POST['name']:null;
$courseData['slug'] = (isset($_POST['slug']))?$_POST['slug']:null;
$courseData['content'] = (isset($_POST['content']))?$_POST['content']:null;

$course = new Course();

if($courseData['id'] != ''){
    $course->setId($courseData['id']);
}

$response = [
    'success' => true,
    'userData' => $courseData,
    'error' => []
];

if($courseData['name'] !=''){
    $course->setName($courseData['name']);
}else{
    $response['success'] = false;
    $response['error'][] = 'Va rugam introduceti un nume';
}

if($courseData['slug'] !=''){
    $course->setSlug($courseData['slug']);
}else{
    $response['success'] = false;
    $response['error'][] = 'Va rugam introduceti o ruta';
}

if($courseData['content'] !=''){
    $course->setContent($courseData['content']);
}else{
    $response['success'] = false;
    $response['error'][] = 'Va rugam introduceti un continut';
}

if($response['success']){
    if($courseData['id']){
        $database->update('courses',[
            'name' => $course->getName(),
            'slug' => $course->getSlug(),
            'content' => $course->getContent(),
        ],[
            'id' => $course->getId()
        ]);
    }else{
        $response = $database->insert('courses',[
            'name' => $course->getName(),
            'slug' => $course->getSlug(),
            'content' => $course->getContent(),
        ]);
    }

    if(!$response){
        $response['success'] = false;
        $response['error'] = "Eroare sql!";
        var_dump($response);
    }else{
        unset($_SESSION['response']);
        header("Location: /admin/content/cursuri.php");
        die();
    }
}
$_SESSION['response'] = $response;
header("Location: /admin/content/cursuri_save.php");
die();

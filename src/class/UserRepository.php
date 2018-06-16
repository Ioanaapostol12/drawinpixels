<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 16-Jun-18
 * Time: 19:18
 */

require_once realpath(__DIR__.'/../../config/database.php');
require_once 'User.php';

class UserRepository
{
    private $users;

    /**
     * @var ../../src/class/database/Database $database
     */
    private $database;

    public function __construct()
    {
        $this->database =  DB::getInstance();
    }

    /**
     * @param $id
     * @return null|User
     */
    public function findOneById($id){
        $query = "SELECT * FROM `users` WHERE id = '".$id."'";
        $userData = $this->database->get_row($query,true);
        if($userData){
            return new User($userData);
        }
       return $userData;
    }
    public function findAll(){
        $users = [];
        $query = "SELECT * FROM `users`";
        $usersData = $this->database->get_results($query,true);
        foreach ($usersData as $key => $userData) {
            $user = new User($userData);
            $users[$user->getId()] = $user;
        }

        return $users;
    }
}
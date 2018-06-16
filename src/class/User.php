<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 16-Jun-18
 * Time: 19:15
 */

class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $firstName;
    private $lastName;
    private $dataSignUp;
    private $phone;
    private $address;
    private $role;

    public function __construct($userData)
    {

        $this->id = $userData->id;
        $this->username = $userData->username;
        $this->password = $userData->password;
        $this->email = $userData->email;
        $this->firstName = $userData->first_name;
        $this->lastName = $userData->last_name;
        $this->dataSignUp = $userData->data_singup;
        $this->phone = $userData->phone;
        $this->address = $userData->address;
        $this->role = $userData->role;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataSignUp()
    {
        return $this->dataSignUp;
    }

    /**
     * @param mixed $dataSignUp
     * @return User
     */
    public function setDataSignUp($dataSignUp)
    {
        $this->dataSignUp = $dataSignUp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function isAdmin(){
        return ($this->getRole() == "ROLE_ADMIN");
    }


}